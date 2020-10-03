<?php

namespace App\Http\Controllers\dashboard;

use App\DataTables\SizeDatatable;
use App\Http\Controllers\Controller;
use App\Http\Requests\ColroRequest;
use App\Http\Requests\SizeRequest;
use App\Models\Dashboard\Size;
use App\Repositories\Repository;
use Mockery\Exception;

class SizeController extends Controller
{
    private $size;

    public function __construct()
    {
        $this->size = new Repository(new Size());
    }

    public function index(SizeDatatable $sizeDatatable)
    {
        return $sizeDatatable->render('admin.sizes.index');
    }

    public function create()
    {
        return view('admin.sizes.create');
    }

    public function store(SizeRequest $request)
    {
        $data = $request->all();

        try {
            $this->size->store($data);
            return redirect()->route('size.index')->with('success', 'size added success');
        }catch(Exception $e) {
            return redirect()->route('size.index')->with('error', 'error');
        }
    }

    public function edit($id)
    {
        $size = Size::findOrFail($id);
        return view('admin.sizes.edit', ['size' => $size]);
    }

    public function update(SizeRequest $request, $id)
    {
        $data = $request->all();
        try {
            $this->size->update($data,$id);
            return redirect()->route('size.index')->with('success', 'size updated success');
        }catch(Exception $e) {
            return redirect()->route('size.index')->with('error', 'error');
        }
    }

    public function destroy($id)
    {
        try {
            $this->size->removeWithFile($id,'');
            return redirect()->route('size.index')->with('success', 'size removed success');
        }catch(Exception $e) {
            return redirect()->route('size.index')->with('error', 'error');
        }
    }
}
