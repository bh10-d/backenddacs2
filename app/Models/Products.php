<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    //
    protected $filltable = [
        'id',
        'title',
        'price',
        'discount_price',
        'detail_products'
    ];
}
