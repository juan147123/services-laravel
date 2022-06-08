<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Interfaces\ControllerInterface;
use App\Interfaces\ProductoRepositoryInterface;
use App\Http\Resources\{ProductoResource,ProductoCollection};

class ProductoController extends Controller implements ControllerInterface
{
    private $repository;

    public function __construct(
        ProductoRepositoryInterface $repository
        ){
        $this->repository = $repository;
    }

    public function create(Request $request){
        return new  ProductoResource(
            $this->repository->create($request->all())
        );
    }

    public function update($id,Request $request){
        try {
            if($this->repository->update($id,$request->all())){
                $data = array("id_producto" => $id,"msg" => "Actualizado con exito");
            }
        } catch (\Throwable $th) {
                return new  ProductoResource(
                    array("id_producto" => -1,"msg" => "Error al actualizar registro")
                );
        }
        return new ProductoResource(
            $data
        );
    }

    public function listAll(){

        return new  ProductoCollection(
            $this->repository->all(
                array('*')
            )
        );

    }

    public function delete($id,Request $request)
    {
         try {
            if($this->repository->update($id,$request->all())){
                $data = array("id_producto" => $id,"msg" => "Actualizado con exito");
            }
        } catch (\Throwable $th) {
                return new  ProductoResource(
                    array("id_producto" => -1,"msg" => "Error al actualizar registro")
                );
        }
        return new ProductoResource(
            $data
        );


    }

    public function findById($id){
        try {
            return new ProductoResource(
                $this->repository->findById($id)
            );
        } catch (\Throwable $th) {
            return new ProductoResource(
                array("id_producto" => -1,"msg" => "No existe el registro a buscar")

            );
        }
    }


}
