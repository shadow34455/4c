<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DownloadController extends Controller
{
    // public function getDownload()
    // {
    //     //PDF file is stored under project/public/download/info.pdf
    //     $file= public_path(). "/download/info.pdf";
    
    //     $headers = array(
    //               'Content-Type: application/pdf',
    //             );
    
    //     return Response::download($file, 'filename.pdf', $headers);
    // }
//     public function getDownload(Request $request)
// {
//     return Storage::download('images/test.jpg');
// }
}
