<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Pay\PaymentModel;


class AdminChartController extends Controller
{
    //
    public function index()
    {
        $order = PaymentModel::get();
        foreach ($order as $d) {
            $data[] = $d->CodeOrder;
        }

        // for ($i = 1; $i <= count($data); $i++) {
        //     $list = DB::select('select sum(Price * Quantity) as totalprice from order_list_product where CodeOrder=' . $i);
        //     $product = DB::select('select * from order_list_product where CodeOrder=' . $i);
        //     $p[] = $product;
        //     $li[] = $list[0];
        // }
        // for ($i = 0; $i < count($order); $i++) {
        //     $order[$i]->totalprice = $li[$i]->totalprice;
        //     $order[$i]->productlist = $p[$i];
        // }
        $orderv2 = PaymentModel::get()->count();
        $total = DB::select('select sum(Price * Quantity) as totalprice from order_list_product');
        $month = date('m');
        for($i = 1; $i <= 12; $i++) {
            $orderv3[$i] = PaymentModel::get()->where('Time',$i)->count();
        }


        // $order[0]->test = '1';
        // dd($orderv3);
        return view('admin.chart.chart')->with(['phonebar'=>$orderv3,'price'=>$total[0],'quantity'=>$orderv2]);
    }
}
