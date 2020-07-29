<?php

namespace Modules\Core\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Spatie\MediaLibrary\Models\Media;

class ImageController extends Controller
{

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $image = Media::findOrFail($id);
        $image->delete();

        return redirect()->back()
            ->with(config('core.session_success'), _t('detail_images') . ' ' . _t('delete_success'));
    }
}
