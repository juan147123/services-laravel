<?php
namespace App\Repositories;

use App\Models\Brand;
use App\Interfaces\BrandRepositoryInterface;

class BrandRepository extends BaseRepository implements BrandRepositoryInterface
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
    public function __construct(Brand $model)
    {
        $this->model = $model;
    }

}
