<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $idsupplier
 * @property string $typedocument
 * @property string $numberdocument
 * @property string $businessname
 * @property string $address
 * @property string $email
 * @property string $phone
 * @property int $enable
 * @property string $updated_at
 * @property string $created_at
 * @property Productsupplier[] $productsuppliers
 */
class Supplier extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'supplier';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'idsupplier';

    /**
     * @var array
     */
    protected $fillable = ['typedocument', 'numberdocument', 'businessname', 'address', 'email', 'phone', 'enable', 'updated_at', 'created_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productsuppliers()
    {
        return $this->hasMany('App\Models\Productsupplier', 'idsupplier', 'idsupplier');
    }
}
