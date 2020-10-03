<?php

namespace App\Http\Controllers\dashboard;

use App\DataTables\ShippingDatatable;
use App\Http\Controllers\Controller;
use App\Http\Requests\ShippingRequest;
use App\Models\Dashboard\Shipping;
use App\Repositories\Repository;
use Illuminate\Http\Request;
use App\User;
use Matrix\Exception;

class ShippingController extends Controller
{


    private $shipping;
    public function __construct()
    {
        $this->shipping = new Repository(new Shipping());
    }

    public function index(ShippingDatatable $datatable)
    {
        return $datatable->render('admin.shippings.index');
    }

    public function create()
    {
        $users = User::get();
        return view('admin.shippings.create', ['users' => $users]);
    }

    public function store(ShippingRequest $request)
    {
        $data = $request->all();

        try {
            $this->shipping->storeWithImage($data, '', 'icon');
            return redirect()->route('shipping.index')->with('success', 'shipping added');
        }catch (Exception $e){
            return redirect()->route('shipping.index')->with('error', 'error');
        }
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $shipping = Shipping::find($id);
        $users = User::get();
        return view('admin.shippings.edit', ['shipping' => $shipping, 'users' => $users]);
    }

    public function update(ShippingRequest $request, $id)
    {
        $data = $request->all();
        try {
            $this->shipping->updateWithImage($data,'','',$id);
            return redirect()->route('shipping.index')->with('success', 'shipping added');
        }catch (Exception $e){
            return redirect()->route('shipping.index')->with('error', 'error');
        }
    }

    public function destroy($id)
    {
        try {
            $this->shipping->remove($id);
            return redirect()->route('shipping.index')->with('success', 'shipping added');
        }catch (Exception $e){
            return redirect()->route('shipping.index')->with('error', 'error');
        }
    }
}
