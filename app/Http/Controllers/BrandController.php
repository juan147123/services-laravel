<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller;
use App\Http\Interfaces\ControllerInterface;
use App\Interfaces\BrandRepositoryInterface;
use App\Http\Resources\{BrandResource,BrandCollection};

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller implements ControllerInterface
{

    private $repository;

    public function __construct(
        BrandRepositoryInterface $repository
        ){
        $this->repository = $repository;
    }
    public function create(Request $request){
        return new  BrandResource(
            $this->repository->create($request->all())
        );
    }

    public function update($id,Request $request){
        try {
            if($this->repository->update($id,$request->all())){
                $data = array("idbrand" => $id,"msg" => "Actualizado con exito");
            }
        } catch (\Throwable $th) {
                return new  BrandResource(
                    array("idbrand" => -1,"msg" => "Error al actualizar registro")
                );
        }
        return new BrandResource(
            $data
        );
    }

    public function listAll(){

        return new  BrandCollection(
            $this->repository->all(
                array('*')
            )
        );

    }

    public function delete($id,Request $request)
    {
         try {
            if($this->repository->update($id,$request->all())){
                $data = array("idbrand" => $id,"msg" => "Actualizado con exito");
            }
        } catch (\Throwable $th) {
                return new  BrandResource(
                    array("idbrand" => -1,"msg" => "Error al actualizar registro")
                );
        }
        return new BrandResource(
            $data
        );


    }

    public function findById($id){
        try {
            return new BrandResource(
                $this->repository->findById($id)
            );
        } catch (\Throwable $th) {
            return new BrandResource(
                array("idbrand" => -1,"msg" => "No existe el registro a buscar")
            );
        }
    }

}
