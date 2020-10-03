<?php


namespace App\Interfaces;


interface RepoInterface
{
    public function all();
    public function store($data);
    public function storeWithImage($data,$folder, $file);
    public function update($data, $id);
    public function updateWithImage($data,$folder, $file, $id);
    public function remove($id);
    public function removeWithFile($id, $file);
    public function findRow($id);
}
