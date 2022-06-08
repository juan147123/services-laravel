<?php
namespace App\Http\Interfaces;
use Illuminate\Http\Request;


interface ControllerInterface {

    public function create(Request $request);
    public function update($id,Request $request);
    public function listAll();
    public function delete($id,Request $request);
    public function findById($id);

}
