<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LanguageController extends Controller
{
    public function __invoke($lang)
    {
        session()->has('lang') ? session()->forget('lang') : '';
        $lang == 'ar'? session()->put('lang', 'ar') : session()->put('lang', 'en');
        return back();
    }
}

