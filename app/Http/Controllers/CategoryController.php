<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Interfaces\ControllerInterface;
use App\Interfaces\CategoryRepositoryInterface;
use App\Http\Resources\{CategoryResource,CategoryCollection};

class CategoryController extends Controller
{
    private $repository;

    public function __construct(
        CategoryRepositoryInterface $repository
        ){
        $this->repository = $repository;
    }

    public function create(Request $request){
        return new  CategoryResource(
            $this->repository->create($request->all())
        );
    }

    public function update($id,Request $request){
        try {
            if($this->repository->update($id,$request->all())){
                $data = array("idcategory" => $id,"msg" => "Actualizado con exito");
            }
        } catch (\Throwable $th) {
                return new  CategoryResource(
                    array("idcategory" => -1,"msg" => "Error al actualizar registro")
                );
        }
        return new CategoryResource(
            $data
        );
    }

    public function listAll(){

        return new  CategoryCollection(
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
                return new  CategoryResource(
                    array("idcategory" => -1,"msg" => "Error al actualizar registro")
                );
        }
        return new CategoryResource(
            $data
        );


    }

    public function findById($id){
        try {
            return new CategoryResource(
                $this->repository->findById($id)
            );
        } catch (\Throwable $th) {
            return new CategoryResource(
                array("idcategory" => -1,"msg" => "No existe el registro a buscar")

            );
        }
    }


}
