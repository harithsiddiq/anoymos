<?php


namespace App\Shop;



use Illuminate\Http\Request;


class Admin implements AdminLoginWeb
{
    private $request;
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function login()
    {
        $request = $this->request;

        $loginOption = $request->input('email');

        $input = filter_var($loginOption, FILTER_VALIDATE_EMAIL) ? 'email' : 'name';

        $request->merge([$input => $loginOption]);

        $remember_me = $request->has('remember_me');

        if (auth()->guard('admin')->attempt([$input => $request->input($input), 'password' => $request->input('password')], $remember_me)) {
            return redirect()->route('admin.dashboard');
        }
        return redirect()->route('admin.loginForm')->with(['error' => 'Wrong name or password']);
    }

    public function editAdmin()
    {

    }
}
