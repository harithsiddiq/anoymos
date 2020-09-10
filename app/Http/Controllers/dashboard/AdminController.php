<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\AdminDataTable;

class AdminController extends Controller
{

    public function index(AdminDataTable $admin)
    {
        return $admin->render('admin.admins.index');
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        return "edit";
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        return "destroy";
    }
}
