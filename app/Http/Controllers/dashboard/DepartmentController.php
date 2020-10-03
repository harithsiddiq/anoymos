<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\DepRequest;
use App\Models\Dashboard\Department;
use App\Repositories\Repository;
use Illuminate\Http\Request;
use Matrix\Exception;

class DepartmentController extends Controller
{
    private $dep;

    public function __construct()
    {
        $this->dep = new Repository(new Department());
    }

    public function index()
    {
        return view('admin.departments.index');
    }

    public function create()
    {
        return view('admin.departments.create');
    }

    public function store(DepRequest $request)
    {
        $data = $request->all();
        $data['parent_id'] == null ? $data['parent_id'] = 0: $request->parent_id;
        try {
            $this->dep->storeWithImage($data,'department', 'icon');
            return redirect()->route('departments.index', ['success', 'dep added success']);
        }catch (Exception $e){
            return redirect()->route('departments.index', ['error', 'error']);
        }
    }

    public function edit($id)
    {
        $deps = Department::find($id);
        return view('admin.departments.edit', ['dep' => $deps]);
    }

    public function update(DepRequest $request, $id)
    {
        $data = $request->all();
        try {
            $this->dep->updateWithImage($data,'department','icon',$id);
            return redirect()->route('departments.index', ['success', 'dep added success']);
        }catch (Exception $e){
            return redirect()->route('departments.index', ['error', 'error']);
        }
    }

    public function destroy($id)
    {
        try {
            $this->dep->remove($id);
            return redirect()->route('departments.index', ['success', 'dep removed success']);
        }catch (Exception $e){
            return redirect()->route('departments.index', ['error', 'error']);
        }
    }


}
