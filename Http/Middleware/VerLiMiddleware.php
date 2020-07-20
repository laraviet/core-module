<?php

namespace Modules\Core\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class VerLiMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $path = module_path('Core', 'Resources/assets/l');
        if ( ! is_dir($path)) {
            abort(500);
        }

        $file = $path . '/l.json';
        $abFile = $path . '/ab.json';

        if ( ! file_exists($file) || ! file_exists($abFile)) {
            abort(500);
        }

        $bu = Cache::rememberForever('bu', function () use ($abFile) {
            $buJson = json_decode(file_get_contents($abFile));

            return base64_decode($buJson->bu);
        });


        $json = json_decode(file_get_contents($file));
        $long = 60 * 24;

        if (Cache::has('l.v.c')) {
            $this->checkVT($json, $long);
        } else {
            try {
                $response = Http::timeout(3)->post("{$bu}/api/v", [
                    "sk" => $json->sk
                ]);

                if ($response->status() !== 200) {
                    abort(500);
                } else {
                    //write result to disk
                    file_put_contents($file, $response->body());
                    Cache::put('l.v.c', 'ok', $long);
                }
            } catch (ConnectionException $ex) {
                $this->checkVT($json, $long);
                Cache::put('l.v.c', 'ok', $long);
            }
        }

        return $next($request);
    }

    private function checkVT($json, $long)
    {
        $vt = Cache::remember('l.vt', $long, function () use ($json) {
            return base64_decode($json->vt);
        });

        if (Carbon::parse($vt) < Carbon::now()) {
            abort(500);
        }
    }
}
