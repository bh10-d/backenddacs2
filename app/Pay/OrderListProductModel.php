<?php

namespace App\Pay;

use Illuminate\Database\Eloquent\Model;

class OrderListProductModel extends Model
{
    //
    protected $table = 'order_list_product';
    protected $primaryKey ='CodeOrder';
    protected $fillable = [
        'CodeOrder',
        'IdProduct',
        'Quantity',
        'Price'
    ];
}
