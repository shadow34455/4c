<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;
use ZipArchive;

class ZipController extends Controller
{
    public function downloadZip($path)
    {
      

        $fileName = "/storage/";

        // if ($zip->open(public_path($fileName), ZipArchive::CREATE) === TRUE) {
            
        //     $files = File::files(public_path('images'));

        //     foreach ($files as $key => $value) {
        //         $relativeNameInZipFile = basename($value);
        //         $zip->addFile($value, $relativeNameInZipFile);
        //     }

        //     $zip->close();
        // }

        return response()->download(public_path($fileName));
    }
}
