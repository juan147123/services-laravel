<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $idbrand
 * @property string $description
 * @property int $enable
 * @property string $updated_at
 * @property string $created_at
 * @property Product[] $products
 */
class Brand extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'brand';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'idbrand';

    /**
     * @var array
     */
    protected $fillable = ['description', 'enable', 'updated_at', 'created_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany('App\Models\Product', 'idbrand', 'idbrand');
    }
}
