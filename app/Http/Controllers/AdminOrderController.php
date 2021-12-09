<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Pay\PaymentModel;

class AdminOrderController extends Controller
{
    //
    public function index()
    {
        $check = PaymentModel::get()->count();
        $order = PaymentModel::get();
        // $order = DB::table('payment')
        //     ->rightJoin('order_list_product', 'payment.CodeOrder', '=', 'order_list_product.CodeOrder')
        //     ->get();
        // $order = DB::table('payment')->get();
        if ($check != 0) {
            foreach ($order as $d) {
                $data[] = $d->CodeOrder;
            }
            for ($i = 0; $i < count($data); $i++) {
                $list = DB::select('select sum(Price * Quantity) as totalprice from order_list_product where CodeOrder=' . $data[$i]);
                $product = DB::select('select * from order_list_product where CodeOrder=' . $data[$i]);
                $p[] = $product;
                $li[] = $list[0];
            }
            for ($i = 0; $i < count($order); $i++) {
                // if($order[$i]->CodeOrder) {
                    $coupon = DB::table('coupon')->where('coupon',$order[$i]->Coupon)->first();
                    if($coupon->condition == 0) {
                        $order[$i]->totalprice = $li[$i]->totalprice - ($li[$i]->totalprice*$coupon->price)/100;
                    }elseif($coupon->condition == 1) {
                        $order[$i]->totalprice = $li[$i]->totalprice - $coupon->price;
                    }else{
                        $order[$i]->totalprice = $li[$i]->totalprice;
                    }
                    $order[$i]->productlist = $p[$i];
                // }
            }
        }
        // $order[0]->test = '1';
        // dd($order);
        return view('admin.order.ordertable')->with(['orders'=>$order,'check'=>$check]);
    }

    public function show(){}

    public function status($id, $status){
        DB::table('payment')->where('CodeOrder', $id)->update(['Status' => $status]);
        return Redirect::to('/order');
    }

    public function delete($id){
        DB::table('payment')->where('CodeOrder',$id)->delete();
        DB::table('order_list_product')->where('CodeOrder',$id)->delete();
        return Redirect::to('/order');
    }
}
