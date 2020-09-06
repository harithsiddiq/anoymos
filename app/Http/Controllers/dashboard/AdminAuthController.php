<?php

namespace App\Http\Controllers\dashboard;

use App\Mail\AdminResetPassword;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Models\Dashboard\Admin;
use Mockery\Exception;

class AdminAuthController extends Controller
{
    public function loginForm()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {

        $admin = new \App\Shop\Admin($request);

        return $admin->login();
    }

    public function logout()
    {
        auth()->guard('admin')->logout();
        return redirect()->route('admin.loginForm');
    }

    public function forgetPassword()
    {
        return view('admin.auth.forget_password');
    }

    public function forgetPasswordPost(Request $request)
    {
        $admin = \App\Models\Dashboard\Admin::where('email', $request->email)->first();

        if (!empty($admin)) {
            $token = app('auth.password.broker')->createToken($admin);
            DB::table('password_resets')->insert([
               'email' => $admin->email,
               'token' => $token,
               'created_at' => Carbon::now()
            ]);
            try {
                Mail::to($admin->email)->send(new AdminResetPassword(['data' => $admin, 'token' => $token]));
            } catch (Exception $e) {
                return '';
            }
            session()->flash('success', 'reset link has been send to your email account');
        }

        return back();
    }

    public function reset($token)
    {
        $check_token = DB::table('password_resets')->where('token', $token)->where('created_at','>', Carbon::now()->subHours(2))->first();
        if (!empty($check_token)) {
            return view('admin.auth.reset', compact('check_token'));
        } else {
            return redirect()->route('admin.forget_form');
        }
    }

    public function reset_post($token, Request $request)
    {

        $this->validate(request(),[
            'password' => 'required|confirmed',
            'password_confirmation' => 'required'
        ]);

        $check_token = DB::table('password_resets')->where('token', $token)->where('created_at','>', Carbon::now()->subHours(2))->first();
        if (!empty($check_token)) {
            $admin = Admin::where('email', $check_token->email);
            $admin->update([
               'email' => $check_token->email,
               'password' => bcrypt(\request('password'))
            ]);
            DB::table('password_resets')->where('email', $check_token->email)->delete();

            $admin = new \App\Shop\Admin($request);

            return $admin->login();

        }
        return '';
    }
}
