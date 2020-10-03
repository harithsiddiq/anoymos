<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Upload extends Controller
{
    public static function upload($file, $path, $name = null)
    {
        $name = $name == null ? time() : $name;
        !empty(\setting()->$file) ? Storage::delete(\setting()->$file): '';
        return request()->file($file)->store($path);
    }
}
