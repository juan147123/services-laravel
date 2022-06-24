<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Interfaces\ControllerInterface;
use App\Interfaces\ProductRepositoryInterface;
use App\Http\Resources\{ProductResource, ProductCollection};


class ProductController extends Controller
{

    private $repository;

    public function __construct(
        ProductRepositoryInterface $repository
    ) {
        $this->repository = $repository;
    }

    public function create(Request $request)
    {
        $insertproduct = $this->repository->create($request->all());
        if($insertproduct){
            $idsupplier=$request->idsupplier;
            $idproduct=$insertproduct->idproduct;
            $this->repository->insertSupplierProduct($idsupplier,$idproduct);
            $data = [
                "data"=>$insertproduct,
                "msg"=>"Datos insertados correctamente"
            ];
        }
        return $data;
    }

    public function update($id, Request $request)
    {
        try {
            if ($this->repository->update($id, $request->all())) {
                $data = array("idproduct" => $id, "msg" => "Actualizado con exito");
            }
        } catch (\Throwable $th) {
            return new  ProductResource(
                array("idproduct" => -1, "msg" => "Error al actualizar registro")
            );
        }
        return new ProductResource(
            $data
        );
    }
    public function listAll()
    {
        $data = $this->repository->listAllSupplierProduct();
        $response = [
            "data"=>$data,
            "count"=>$data->count()
        ];
        return $response;
    }

    public function delete($id, Request $request)
    {
        try {
            if ($this->repository->update($id, $request->all())) {
                $data = array("idproduct" => $id, "msg" => "Actualizado con exito");
            }
        } catch (\Throwable $th) {
            return new  ProductResource(
                array("idproduct" => -1, "msg" => "Error al actualizar registro")
            );
        }
        return new ProductResource(
            $data
        );
    }

    public function findById($id)
    {
        try {
            return new ProductResource(
                $this->repository->findById($id)
            );
        } catch (\Throwable $th) {
            return new ProductResource(
                array("idproduct" => -1, "msg" => "No existe el registro a buscar")

            );
        }
    }
}
