<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Pay\PaymentModel;

class AdminDashboardController extends Controller
{
    public function index(){
        // $order = PaymentModel::get();
        //     foreach ($order as $d) {
        //         $data[] = $d->CodeOrder;
        //     }
        $countorder = PaymentModel::get()->count();
        for($i = 1; $i <= 12; $i++) {
            $orderv3[$i] = PaymentModel::get()->where('Time',$i)->count();
            $total[$i] = DB::select('select sum(Price * Quantity) as totalprice from order_list_product where Time = '.$i);
        }

        // dd($total[1][0]->totalprice);
        return view('admin.dashboard.dashboard')->with(['order'=>$countorder,'price'=>$total]);
    }
}
