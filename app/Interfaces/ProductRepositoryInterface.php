<?php
namespace App\Interfaces;

interface ProductRepositoryInterface extends EloquentRepositoryInterface {
    public function insertSupplierProduct($idsupplier,$idproduct);
}


