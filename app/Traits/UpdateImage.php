<?php

namespace App\Traits;

use Illuminate\Http\Request;

trait UpdateImage
{
    /**
     * Handles the image upload or retrieval from existing data.
     *
     * @param Request $request
     * @param string $key
     * @param mixed $defaultImage
     * @return string|null
     */
    private function handleImageUpload($request, $key, $defaultImage, $path = 'images')
    {
        if ($request->hasFile($key)) {
            return $request->file($key)->store($path, 'public');
        }
        return $defaultImage;
    }

    /**
     * Handles multiple images for a given key.
     *
     * @param Request $request
     * @param string $baseKey
     * @param array $existingImages
     * @param int $loopCount
     * @return array
     */
    private function handleMultipleImages(Request $request, string $baseKey, array $existingImages)
    {
        $images = [];
        foreach ($existingImages as $index => $existingImage) {
            $images[$index]['image'] = $this->handleImageUpload($request,"{$baseKey}.{$index}.image",$existingImage->image ?? null );
        }
        return $images;
    }
}
