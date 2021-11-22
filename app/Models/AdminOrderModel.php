<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminOrderModel extends Model
{
    //
    protected $table = 'payment';
    protected $primaryKey ='CodeOrder';
    protected $fillable = [
        'CodeOrder',
        'IdUser',
        'NameUser',
        'PhoneUser',
        'AddressUser',
        'TypePayment',
        // 'IdProduct',
        // 'Quantity',
        // 'Price'
    ];
}
