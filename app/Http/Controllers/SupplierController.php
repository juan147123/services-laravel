<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Interfaces\ControllerInterface;
use App\Interfaces\SupplierRepositoryInterface;
use App\Http\Resources\{SupplierResource,SupplierCollection};

class SupplierController extends Controller
{
    private $repository;

    public function __construct(
        SupplierRepositoryInterface $repository
        ){
        $this->repository = $repository;
    }

    public function create(Request $request){
        return new  SupplierResource(
            $this->repository->create($request->all())
        );
    }

    public function update($id,Request $request){
        try {
            if($this->repository->update($id,$request->all())){
                $data = array("idcategory" => $id,"msg" => "Actualizado con exito");
            }
        } catch (\Throwable $th) {
                return new  SupplierResource(
                    array("idcategory" => -1,"msg" => "Error al actualizar registro")
                );
        }
        return new SupplierResource(
            $data
        );
    }

    public function listAll(){

        return new  SupplierCollection(
            $this->repository->all(
                array('*')
            )
        );

    }

    public function delete($id,Request $request)
    {
         try {
            if($this->repository->update($id,$request->all())){
                $data = array("idcategory" => $id,"msg" => "Actualizado con exito");
            }
        } catch (\Throwable $th) {
                return new  SupplierResource(
                    array("idcategory" => -1,"msg" => "Error al actualizar registro")
                );
        }
        return new SupplierResource(
            $data
        );


    }

    public function findById($id){
        try {
            return new SupplierResource(
                $this->repository->findById($id)
            );
        } catch (\Throwable $th) {
            return new SupplierResource(
                array("idcategory" => -1,"msg" => "No existe el registro a buscar")

            );
        }
    }
}
