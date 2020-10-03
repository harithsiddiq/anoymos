<?php


namespace App\Repositories;

use App\Interfaces\RepoInterface;
use Illuminate\Support\Facades\Storage;
use Up;

class Repository implements RepoInterface
{

    private $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function all()
    {
        return $this->model->all();
    }

    public function store($data)
    {
        return $this->model->create($data);
    }

    public function storeWithImage($data, $folder, $file)
    {
        if(request()->hasFile($file)) {
            $data[$file] = Up::upload($file, $folder);
        }else{
            $data[$file] = '';
        }

        return $this->store($data);
    }

    public function update($data, $id)
    {
        $row = $this->model->find($id);
        return $row->update($data);
    }

    public function updateWithImage($data, $folder, $file, $id)
    {
        if(request()->hasFile($file)) {
            $data[$file] = Up::upload($file, $folder);
        };

        return $this->update($data,$id);

    }

    public function remove($id)
    {
        $row = $this->model->find($id);
        return $row->delete();
    }

    public function removeWithFile($id, $file)
    {
        $row = $this->model->find($id);
        $row->logo !== '' ?Storage::delete($row->logo):"";
        return $this->remove($id);
    }

    public function findRow($id)
    {
        // TODO: Implement findRow() method.
    }
}
