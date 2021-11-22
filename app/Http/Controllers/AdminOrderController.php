<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Pay\PaymentModel;

class AdminOrderController extends Controller
{
    //
    public function index(){
        // $order = PaymentModel::get();
        $order = DB::table('payment')
            ->leftJoin('order_list_product', 'payment.CodeOrder', '=', 'order_list_product.CodeOrder')
            ->get();
        // dd($order);
        return view('admin/order.order')->with('orders', $order);
    }

    public function show(){}
}
