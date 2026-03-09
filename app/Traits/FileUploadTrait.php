<?php

namespace App\Traits;

use Illuminate\Http\Request;
use File;

trait FileUploadTrait
{
    /**
     * Handle file upload.
     *
     * @param Request $request
     * @param string $inputName
     * @param string|null $oldPath
     * @param string $path
     * @return string|null
     */
    public function uploadImage(Request $request, string $inputName, ?string $oldPath = null, string $path = 'uploads'): ?string
    {
        if ($request->hasFile($inputName)) {
            $image = $request->file($inputName);
            $ext = $image->getClientOriginalExtension();
            $imageName = 'media_' . uniqid() . '.' . $ext;

            $image->move(public_path($path), $imageName);

            if ($oldPath && File::exists(public_path($oldPath))) {
                File::delete(public_path($oldPath));
            }

            return $path . '/' . $imageName;
        }

        return null;
    }
}
