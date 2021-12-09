<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminCouponModel extends Model
{
    //
    protected $table = 'coupon';
    protected $primaryKey ='id';
    protected $fillable = [
        'coupon',
        'name',
        'condition',
        'quantity',
        'price'
    ];
}
