<?php

namespace App\Http\Controllers\dashboard;

use App\Models\Dashboard\Setting;
use App\Http\Controllers\Controller;
use App\Http\Requests\SettingRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Up;

class SettingController extends Controller
{
    public function setting()
    {
        return view('admin.settings.create');
    }

    public function save_setting(SettingRequest $request)
    {
        $attributes = $request->only(['sitename_ar', 'sitename_en', 'email', 'description', 'keyword', 'status', 'main_lang','message_maintenance']);;
        if ($request->hasFile('logo')){
            $attributes['logo'] = Up::upload('logo','setting','');
        }

        if ($request->hasFile('icon')){
            $attributes['icon'] = Up::upload('icon','setting','');;
        }

        Setting::orderBy('id', 'desc')->update($attributes);

        return redirect()->back()->with(['success' => 'image uploaded successfully']);
    }
}
