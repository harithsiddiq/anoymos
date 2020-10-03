<?php

namespace App\Http\Controllers\dashboard;

use App\DataTables\MallDatatable;
use App\Http\Controllers\Controller;
use App\Http\Requests\MallRequest;
use App\Http\Requests\ShippingRequest;
use App\Models\Dashboard\Country;
use App\Models\Dashboard\Mall;
use App\Repositories\Repository;
use App\User;
use Matrix\Exception;

class MallController extends Controller
{

    private $mall;
    private $countries;
    public function __construct()
    {
        $this->mall = new Repository(new Mall());
        $this->countries = Country::selectRaw('country_name_'.lang().' as name')->selectRaw('id as id')->get();

    }

    public function index(MallDatatable $datatable)
    {
        return $datatable->render('admin.malls.index');
    }

    public function create()
    {
        return view('admin.malls.create', ['countries' => $this->countries]);
    }

    public function store(MallRequest $request)
    {
        $data = $request->all();

        try {
            $this->mall->storeWithImage($data, '', 'icon');
            return redirect()->route('mall.index')->with('success', 'mall added');
        }catch (Exception $e){
            return redirect()->route('mall.index')->with('error', 'error');
        }
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $mail = Mall::find($id);
        return view('admin.malls.edit', ['mall' => $mail, 'countries' => $this->countries]);
    }

    public function update(MallRequest $request, $id)
    {
        $data = $request->all();
        try {
            $this->mall->updateWithImage($data,'','',$id);
            return redirect()->route('mall.index')->with('success', 'mall updated');
        }catch (Exception $e){
            return redirect()->route('mall.index')->with('error', 'error');
        }
    }

    public function destroy($id)
    {
        try {
            $this->mall->remove($id);
            return redirect()->route('mall.index')->with('success', 'mall deleted');
        }catch (Exception $e){
            return redirect()->route('mall.index')->with('error', 'error');
        }
    }
}
