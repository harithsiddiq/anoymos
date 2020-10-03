<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Dashboard\Admin;
use Illuminate\Http\Request;
use App\DataTables\AdminDataTable;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{

    public function index(AdminDataTable $admin)
    {
        return $admin->render('admin.admins.index');
    }


    public function create()
    {
        return view('admin.admins.create');
    }


    public function store(Request $request)
    {

       $this->validate(request(), [
           'name' => 'required',
           'email' => 'required|email|unique:admins',
           'password' => 'required',]
       );


        Admin::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'active' => $request->has('active') ? 1 : 0
        ]);


        return redirect()->route('admins.index')->with(['success' => 'admin added successfully']);
    }


    public function show($id)
    {
        return 'show';
    }


    public function edit($id)
    {
        $admin = Admin::findOrFail($id);

        return view('admin.admins.edit', compact('admin'));
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        $admin = Admin::findOrFail($id);

        $admin->delete();

        return redirect()->route('admins.index')->with(['success' => 'admin deleted success']);
    }

    public function multi_delete(Request $request)
    {

        $count = Admin::find(\request('item'))->count();

        if (is_array($request->input('item'))) {
            Admin::destroy($request->input('item'));
        } else {
            Admin::find($request->input('item'))->delete();
        }


        return redirect()->route('admins.index')->with(['success' => "{$count} records are deleted success"]);
    }
}
