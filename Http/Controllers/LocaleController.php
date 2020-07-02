<?php

namespace Modules\Core\Http\Controllers;

use Illuminate\Http\RedirectResponse;

class LocaleController extends Controller
{
    /**
     * @param $locale
     * @return RedirectResponse
     */
    public function update($locale)
    {
        if ( ! in_array($locale, ['en', 'vi'])) {
            abort(400);
        }

        session([
            config('core.session_locale') => $locale
        ]);

        return redirect()->back();
    }
}
