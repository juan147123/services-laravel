<?php
namespace App\Interfaces;

interface ProductRepositoryInterface extends EloquentRepositoryInterface {
    public function insertSupplierProduct($idsupplier,$idproduct);
    public function listAllSupplierProduct();
    public function updateSupplierProduct($idproductsuplier,$idsupplier,$idproduct);
}


