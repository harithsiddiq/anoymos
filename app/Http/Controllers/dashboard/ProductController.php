<?php

namespace App\Http\Controllers\dashboard;

use App\DataTables\ProductDatatable;
use App\DataTables\SizeDatatable;
use App\Http\Controllers\Controller;
use App\Http\Requests\SizeRequest;
use App\Models\Dashboard\Product;
use App\Repositories\Repository;
use Illuminate\Http\Request;
use Mockery\Exception;

class ProductController extends Controller
{
    private $product;

    public function __construct()
    {
        $this->product = new Repository(new Product());
    }

    public function index(ProductDatatable $datatable)
    {
        return $datatable->render('admin.products.index');
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(SizeRequest $request)
    {
        return $data = $request->all();

        try {
            $this->product->store($data);
            return redirect()->route('product.index')->with('success', 'product added success');
        }catch(Exception $e) {
            return redirect()->route('product.index')->with('error', 'error');
        }
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.products.edit', ['product' => $product]);
    }

    public function update(SizeRequest $request, $id)
    {
        $data = $request->all();
        try {
            $this->product->update($data,$id);
            return redirect()->route('product.index')->with('success', 'product updated success');
        }catch(Exception $e) {
            return redirect()->route('product.index')->with('error', 'error');
        }
    }

    public function destroy($id)
    {
        try {
            $this->product->removeWithFile($id,'');
            return redirect()->route('product.index')->with('success', 'product removed success');
        }catch(Exception $e) {
            return redirect()->route('product.index')->with('error', 'error');
        }
    }
}
