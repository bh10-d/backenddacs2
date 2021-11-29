<?php

namespace App\Pay;

use Illuminate\Database\Eloquent\Model;

class PaymentModel extends Model
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
        'Time',
        'Status',
    ];
    // public function order() {
    //     return $this->belongsTo('App\Pay\OrderListProductModel');
    // }
}
