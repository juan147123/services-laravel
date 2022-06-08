<?php
namespace App\Repositories;

use App\Models\Producto;
use App\Interfaces\ProductoRepositoryInterface;

class ProductoRepository extends BaseRepository implements ProductoRepositoryInterface
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
    public function __construct(Producto $model)
    {
        $this->model = $model;
    }

}
