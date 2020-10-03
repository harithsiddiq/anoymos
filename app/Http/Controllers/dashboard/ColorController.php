<?php

namespace App\Http\Controllers\dashboard;

use App\DataTables\ColorDatatable;
use App\Http\Controllers\Controller;
use App\Http\Requests\ColroRequest;
use App\Models\Dashboard\Color;
use App\Repositories\Repository;
use Mockery\Exception;

class ColorController extends Controller
{
    private $color;

    public function __construct()
    {
        $this->color = new Repository(new Color());
    }


    public function index(ColorDatatable $colorDatatable)
    {
        return $colorDatatable->render('admin.colors.index');
    }

    public function create()
    {
        return view('admin.colors.create');
    }

    public function store(ColroRequest $request)
    {
        $data = $request->all();

        try {
            $this->color->store($data);
            return redirect()->route('color.index')->with('success', 'color added success');
        }catch(Exception $e) {
            return redirect()->route('color.index')->with('error', 'error');
        }
    }

    public function edit($id)
    {
        $color = Color::findOrFail($id);
        return view('admin.colors.edit', ['color' => $color]);
    }

    public function update(ColroRequest $request, $id)
    {
        $data = $request->all();
        try {
            $this->color->update($data,$id);
            return redirect()->route('color.index')->with('success', 'color updated success');
        }catch(Exception $e) {
            return redirect()->route('color.index')->with('error', 'error');
        }
    }

    public function destroy($id)
    {
        try {
            $this->color->removeWithFile($id,'');
            return redirect()->route('color.index')->with('success', 'color removed success');
        }catch(Exception $e) {
            return redirect()->route('color.index')->with('error', 'error');
        }
    }
}
