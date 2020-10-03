<?php

namespace App\Http\Controllers\dashboard;

use App\DataTables\CityDatatable;
use App\DataTables\StateDatatable;
use App\Http\Controllers\Controller;
use App\Http\Requests\StateRequest;
use App\Models\Dashboard\City;
use App\Models\Dashboard\State;
use App\Models\Dashboard\Country;
use App\Repositories\Repository;
use Matrix\Exception;

class StateController extends Controller
{

    private $state;

    public function __construct()
    {
        $this->state = new Repository(new State());
    }

    public function index(StateDatatable $stateDatatable)
    {
        return $stateDatatable->render('admin.states.index');
    }

    public function create()
    {
        $countries = Country::orderBy('id', 'desc')->select('country_name_'.lang().' as country', 'id')->get();
        return view('admin.states.create', ['countries' => $countries]);
    }

    public function store(StateRequest $request)
    {
        $data = $request->all();

        try {
            $this->state->store($data);
            return redirect()->route('state.index')->with('success', 'state added success');
        }catch(Exception $e) {
            return redirect()->route('state.index')->with('error', 'error');
        }
    }

    public function edit($id)
    {
        $state = State::findOrFail($id);
        $country = Country::all();
        return view('admin.states.edit', ['state' => $state, 'countries' => $country]);
    }

    public function update(StateRequest $request, $id)
    {
        $data = $request->all();
        try {
            $this->state->update($data,$id);
            return redirect()->route('state.index')->with('success', 'state updated success');
        }catch(Exception $e) {
            return redirect()->route('state.index')->with('error', 'error');
        }
    }

    public function destroy($id)
    {
        try {
            $this->state->remove($id);
            return redirect()->route('state.index')->with('success', 'state removed success');
        }catch(Exception $e) {
            return redirect()->route('state.index')->with('error', 'error');
        }
    }

    public function getCity()
    {
        return City::where('country_id', request('country'))->select('city_name_'.lang(), 'id')->get();
    }
}
