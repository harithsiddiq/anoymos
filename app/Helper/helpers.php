<?php

use Illuminate\Support\Facades\Request;

function active_link($name) {
    if (preg_match('/'.$name.'/i', Request::segment(2))) {
        return ['menu-open', 'display: block'];
    } else {
        return ['', ''];
    }
}

function setting() {
    return \App\Models\Dashboard\Setting::orderBy('id', 'DESC')->first();
}

function imageValidate($role = null) {
    if (is_null($role)) {
        return 'mimes:jpg,jpeg,png,gif';
    }
    return 'mimes:'.$role;
}

function lang() {
    if (session()->has('lang')) {
        return session('lang');
    } else {
        return setting()->main_lang;
    }
}

function direction() {
    if (lang() == 'ar') {
        return 'rtl';
    } else {
        return 'ltr';
    }
}

function load_dep($select=null) {
     $departments = \App\Models\Dashboard\Department::selectRaw('dep_name_'.lang().' as name')
        ->selectRaw('id as id')
        ->selectRaw('parent_id as parent')
        ->get(['id', 'name', 'parent']);

    $dep_arr = [];
    $list_arr = [];
    foreach ($departments as $dep):
        if ($select !== null and $select == $dep->id):
            $list_arr['icon'] = '';
            $list_arr['li_attr'] = '';
            $list_arr['a_attr'] = '';
            $list_arr['children'] = [];
            $list_arr['state'] = [
                'opened' => true,
                'selected' => true,
            ];
        endif;

        $list_arr['id'] = $dep->id;
        $list_arr['parent'] = $dep->parent > 0 ? $dep->parent: "#";
        $list_arr['text'] = $dep->name;

        array_push($dep_arr,$list_arr);

    endforeach;

    return json_encode($dep_arr, JSON_UNESCAPED_UNICODE);
}
