<?php

namespace App\Http\Controllers\dashboard;

use App\DataTables\CityDatatable;
use App\Http\Controllers\Controller;
use App\Http\Requests\CityRequest;
use App\Models\Dashboard\City;
use App\Models\Dashboard\Country;
use App\Repositories\Repository;
use Illuminate\Http\Request;
use Matrix\Exception;

class CityController extends Controller
{

    private $city;

    public function __construct()
    {
        $this->city = new Repository(new City());
    }


    public function index(CityDatatable $cityDatatable)
    {
        return $cityDatatable->render('admin.cities.index');
    }

    public function create()
    {
        $countries = Country::orderBy('id', 'desc')->select('country_name_'.lang().' as country', 'id')->get();
        return view('admin.cities.create', ['countries' => $countries]);
    }

    public function store(CityRequest $request)
    {
        $data = $request->all();

        try {
            $this->city->store($data);
            return redirect()->route('city.index')->with('success', 'city added success');
        }catch(Exception $e) {
            return redirect()->route('city.index')->with('error', 'error');
        }
    }


    public function edit($id)
    {
        $city = City::findOrFail($id);
        return view('admin.cities.edit', ['city' => $city]);
    }

    public function update(CityRequest $request, $id)
    {
        $data = $request->all();
        try {
            $this->city->update($data,$id);
            return redirect()->route('city.index')->with('success', 'city updated success');
        }catch(Exception $e) {
            return redirect()->route('city.index')->with('error', 'error');
        }
    }

    public function destroy($id)
    {
        try {
            $this->city->remove($id);
            return redirect()->route('city.index')->with('success', 'city removed success');
        }catch(Exception $e) {
            return redirect()->route('city.index')->with('error', 'error');
        }
    }
}
