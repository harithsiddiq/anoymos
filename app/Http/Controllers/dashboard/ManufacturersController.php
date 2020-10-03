<?php

namespace App\Http\Controllers\dashboard;

use App\DataTables\ManifacthrerDatatable;
use App\Http\Controllers\Controller;
use App\Models\Dashboard\Manufacturer;
use App\Repositories\Repository;
use Illuminate\Http\Request;
use Matrix\Exception;

class ManufacturersController extends Controller
{

    private $factory;

    public function __construct()
    {
        $this->factory = new Repository(new Manufacturer());
    }

    public function index(ManifacthrerDatatable $factory)
    {
        return $factory->render('admin.manufacturer.index');
    }

    public function create()
    {
        return view('admin.manufacturer.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        try {
            $this->factory->storeWithImage($data,'manufacture', 'icon');
            return redirect()->route('manufacturer.index', ['success', 'manufacture added success']);
        }catch (Exception $e){
            return redirect()->route('manufacturer.index', ['error', 'error']);
        }
    }

    public function edit($id)
    {
        $factory = Manufacturer::find($id);
        return view('admin.manufacturer.edit', ['factory' => $factory]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        try {
            $this->factory->updateWithImage($data,'department', 'icon', $id);
            return redirect()->route('manufacturer.index', ['success', 'manufacture updated success']);
        }catch (Exception $e){
            return redirect()->route('manufacturer.index', ['error', 'error']);
        }
    }

    public function destroy($id)
    {
        try {
            $this->factory->removeWithFile($id,'manufacture');
            return redirect()->route('manufacturer.index', ['success', 'manufacture updated success']);
        }catch (Exception $e){
            return redirect()->route('manufacturer.index', ['error', 'error']);
        }
    }
}
