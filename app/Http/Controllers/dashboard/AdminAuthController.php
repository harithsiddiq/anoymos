<?php

namespace App\Http\Controllers\dashboard;

use App\Shop\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminAuthController extends Controller
{
    public function loginForm()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {

        $admin = new Admin($request);

        return $admin->login();
    }

    public function logout()
    {
        auth()->guard('admin')->logout();
        return redirect()->route('admin.loginForm');
    }

    public function forgetPassword(Request $request)
    {
        return view('admin.auth.forget_password');
    }

    public function forgetPasswordPost(Request $request)
    {

        $admin = DB::table('admins')->where('email', $request->input('email'))->first();

        if (!empty($admin)) {
            $token = app('auth.password.broker')->createToken($admin);
            return $token;
        }
        return '';
    }

}
