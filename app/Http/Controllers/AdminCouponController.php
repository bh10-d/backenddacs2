<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminCouponModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class AdminCouponController extends Controller
{
    //
    public function index(){
        return view('admin.coupon.coupon');
    }

    public function show(){
        $data = DB::table('coupon')->get();
        // dd($data);
        return view('admin.coupon.coupontable')->with('coupons',$data);
    }

    public function create(Request $request){
        AdminCouponModel::insert([
            'coupon'=>$request->code,
            'name'=>$request->name,
            'condition'=>$request->condition,
            'quantity'=>$request->quantity,
            'price'=>$request->price
        ]);
    }

    public function edit($id){
        $data = AdminCouponModel::find($id);
        return view('admin.coupon.couponedit')->with('coupons',$data);
        // dd($data);
    }

    public function delete($id){
        AdminCouponModel::find($id)->delete();
        return Redirect::to('/coupon');
    }
}
