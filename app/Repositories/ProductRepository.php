<?php
namespace App\Repositories;

use App\Models\Product;
use App\Interfaces\ProductRepositoryInterface;
use Illuminate\Support\Facades\DB;

class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * BaseRepository constructor.
     *
     * @param Model $model
     */
    public function __construct(Product $model)
    {
        $this->model = $model;
    }

    public function insertSupplierProduct($idsupplier,$idproduct){
        return DB::table('productsupplier')->insert(['idsupplier'=>$idsupplier,'idproduct'=>$idproduct]);
    }
    
    public function updateSupplierProduct($idproductsuplier,$idsupplier,$idproduct){
        return DB::table('productsupplier')->where(['idproductsuplier'=>$idproductsuplier])->update(['idsupplier'=>$idsupplier,'idproduct'=>$idproduct]);
    }

    public function listAllSupplierProduct(){
        return $this->model->select('product.*','supplier.idsupplier','supplier.businessname','productsupplier.idproductsuplier')
        ->join('productsupplier', 'product.idproduct', '=', 'productsupplier.idproduct')
        ->join('supplier', 'productsupplier.idsupplier', '=', 'supplier.idsupplier')
        ->get();  ;
    }
}
