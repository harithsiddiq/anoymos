<?php

namespace App\Http\Controllers\dashboard;

use App\DataTables\CountryDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\CountryRequest;
use App\Models\Dashboard\Country;
use App\Repositories\Repository;
use Illuminate\Http\Request;
use Matrix\Exception;

class CountryController extends Controller
{

    private $country;

    public function __construct()
    {
        $this->country = new Repository(new Country());
    }

    public function index(CountryDataTable $country)
    {
        return $country->render('admin.countries.index');
    }

    public function create()
    {
        return view('admin.countries.create');
    }

    public function store(CountryRequest $request)
    {

        $data = $this->data($request);

        try{
            $this->country->storeWithImage($data,'countries','logo');
            return redirect()->route('country.index')->with('success', 'country added success');
        }catch (Exception $e) {
            return redirect()->route('country.index')->with('error', 'error'.$e);
        }
    }

    public function edit($id)
    {
        $country = Country::findOrFail($id);
        return view('admin.countries.edit', compact('country'));
    }

    public function update(CountryRequest $request,$id)
    {
        $data = $this->data($request);
        try{
            $this->country->updateWithImage($data,'photo','countries', $id);
            return redirect()->route('country.index')->with('success', 'country updated success');
        }catch (Exception $e) {
            return redirect()->route('country.index')->with('error', 'error'.$e);
        }
    }

    public function destroy($id)
    {
        try{
            $this->country->remove($id);
            return redirect()->route('country.index')->with('success', 'country deleted success');
        }catch (Exception $e) {
            return redirect()->route('country.index')->with('error', 'error'.$e);
        }
    }

    public function data($request)
    {
        return [
            'country_name_ar' => $request->country_name_ar,
            'country_name_en' => $request->country_name_en,
            'code' => $request->code,
            'mob' => $request->mob
        ];
    }
}
