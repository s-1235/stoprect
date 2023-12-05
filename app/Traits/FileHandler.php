<?php


namespace App\Traits;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

trait FileHandler
{

    /**
     * @param $file
     * @param string $path
     * @param string $nameDisk
     * @return string
     */
    public function saveImage($file, $path, $nameDisk)
    {
        if ($file) {
            $filename = $file->getClientOriginalName();
            $filename = time().$filename;
            $path = $path . $filename;
            Storage::disk($nameDisk)->put($path, File::get($file));
        } else {
            return '';
        }
        Log::alert("path", [$path]);
        return Storage::disk($nameDisk)->url($path);
    }

    public function resizeImage($file, array $sizes)
    {

    }

    /**
     * @param        $file
     * @param string $path
     *
     * @return string
     */
    private function formationPath($filename, string $path): string
    {
        $filename = time() . $filename;
        $path = $path . $filename;
        return $path;
}
}
