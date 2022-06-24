<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $idproduct
 * @property int $idcategory
 * @property int $idbrand
 * @property string $description
 * @property float $priceunit
 * @property int $stock
 * @property int $enable
 * @property string $updated_at
 * @property string $created_at
 * @property Category $category
 * @property Brand $brand
 * @property Productsupplier[] $productsuppliers
 */
class Product extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'product';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'idproduct';

    /**
     * @var array
     */
    protected $fillable = ['idcategory', 'idbrand', 'description', 'priceunit', 'stock', 'enable', 'updated_at', 'created_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'idcategory', 'idcategory');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function brand()
    {
        return $this->belongsTo('App\Models\Brand', 'idbrand', 'idbrand');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productsuppliers()
    {
        return $this->hasMany('App\Models\Productsupplier', 'idproduct', 'idproduct');
    }
}
