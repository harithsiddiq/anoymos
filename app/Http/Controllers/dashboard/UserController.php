<?php

namespace App\Http\Controllers\dashboard;

use App\DataTables\UserDatatables;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Http\Request;
use Matrix\Exception;

class UserController extends Controller
{

    public function index(UserDatatables $user)
    {
        return $user->render('admin.users.index');
    }


    public function create()
    {
        return view('admin.users.create');
    }


    public function store(UserRequest $request)
    {


        try {
            User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => $request->input('password'),
                'level' => $request->input('level')
            ]);

            return redirect()->route('users.index')->with(['success' => 'user added success']);

        }catch(\Exception $e) {
            return redirect()->route('users.index')->with(['error' => 'error']);
        }

    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $user = User::find($id);

        return view('admin.users.edit', compact('user'));
    }


    public function update(Request $request, $id)
    {

        $attribute = $request->except('password','_token', '_method');

        if (!is_null($request->input('password'))) {
             $attribute['password'] = bcrypt($request->input('password'));
        }

        try {
            User::where('id', $id)->update($attribute);
            return redirect()->route('users.index')->with(['success' => 'user updated success']);
        }catch (Exception $e) {
            return redirect()->route('users.index')->with(['error' => 'error']);
        }
    }

    public function destroy($id)
    {
        $user  = User::find($id);

        $user->delete();

        return redirect()->back();
    }
}
