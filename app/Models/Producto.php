<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_pro
 * @property string $CodigoProd
 * @property string $DescripcionProd
 * @property int $CodigoCat
 * @property float $PrecioCompra
 * @property int $porcentaje
 * @property float $PrecioVenta
 * @property string $Modelo
 * @property int $idmarca
 * @property int $idColor
 * @property int $Stock
 * @property string $Imagen
 * @property string $Estado
 * @property int $enable
 */
class Producto extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'producto';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_pro';

    /**
     * @var array
     */
    protected $fillable = ['CodigoProd', 'DescripcionProd', 'CodigoCat', 'PrecioCompra', 'porcentaje', 'PrecioVenta', 'Modelo', 'idmarca', 'idColor', 'Stock', 'Imagen', 'Estado', 'enable'];
}
