<?php

namespace App\Http\Controllers;

use App\Using\Disposable\TextFile;

class FileController extends Controller
{
    public function show() 
    {
        $file = new TextFile(storage_path('files/movies.txt'), 'r');
        using($file, function (TextFile $file) {
            echo $file->read() . PHP_EOL;
        });
    }
}
