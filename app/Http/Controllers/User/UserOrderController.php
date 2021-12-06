<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Pay\PaymentModel;
use Illuminate\Support\Facades\DB;
class UserOrderController extends Controller
{
    //
    public function index(){

        $check = PaymentModel::get()->where('IdUser',Auth::user()->id)->count();
        // $order = PaymentModel::get()->where('IdUser',Auth::user()->id);
        $order = DB::table('payment')->where('IdUser',Auth::user()->id)->get();





        if ($check != 0) {
            foreach ($order as $d) {
                $data[] = $d->CodeOrder;
            }
            for ($i = 0; $i < $check; $i++) {
                $list = DB::select('select sum(Price * Quantity) as totalprice from order_list_product where CodeOrder=' . $data[$i]);
                $product = DB::select('select * from order_list_product where CodeOrder=' . $data[$i]);
                $p[] = $product;
                $li[] = $list[0];
            }
            for ($i = 0; $i < $check; $i++) {
                // if($order[$i]->CodeOrder) {
                    $order[$i]->totalprice = $li[$i]->totalprice;
                    $order[$i]->productlist = $p[$i];
                // }
            }
        }




        // dd($order);
        return view('user.userorder')->with(['orders'=>$order,'check'=>$check]);
    }
}
