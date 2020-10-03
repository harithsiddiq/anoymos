<?php

namespace App\Http\Controllers\dashboard;

use App\DataTables\BrandDatatable;
use App\Http\Controllers\Controller;
use App\Http\Requests\brandRequest;
use App\Models\Dashboard\brand;
use App\Repositories\Repository;
use Illuminate\Support\Facades\Storage;
use Matrix\Exception;

class BrandController extends Controller
{
    private $brand;

    public function __construct()
    {
        $this->brand = new Repository(new Brand());
    }


    public function index(BrandDatatable $brandDatatable)
    {
        return $brandDatatable->render('admin.brands.index');
    }

    public function create()
    {
        return view('admin.brands.create');
    }

    public function store(BrandRequest $request)
    {
        $data = $request->all();

        try {
            $this->brand->storeWithImage($data, 'brand', 'logo');
            return redirect()->route('brand.index')->with('success', 'brand added success');
        }catch(Exception $e) {
            return redirect()->route('brand.index')->with('error', 'error');
        }
    }

    public function edit($id)
    {
        $brand = Brand::findOrFail($id);
        return view('admin.brands.edit', ['brand' => $brand]);
    }

    public function update(BrandRequest $request, $id)
    {
        $data = $request->all();
        try {
            $this->brand->update($data,$id);
            return redirect()->route('brand.index')->with('success', 'brand updated success');
        }catch(Exception $e) {
            return redirect()->route('brand.index')->with('error', 'error');
        }
    }

    public function destroy($id)
    {
        try {
            $this->brand->removeWithFile($id,'');
            return redirect()->route('brand.index')->with('success', 'brand removed success');
        }catch(Exception $e) {
            return redirect()->route('brand.index')->with('error', 'error');
        }
    }
}
