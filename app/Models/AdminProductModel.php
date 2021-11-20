<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminProductModel extends Model
{
    //
    protected $table = 'admin_product_models';
    protected $primaryKey ='id';
    protected $fillable = [
        'id',
        'code',
        'productname',
        'productcate',
        'quantity',
        'price',
        'quantity',
        'description'
    ];
}
