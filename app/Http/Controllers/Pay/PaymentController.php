<?php

namespace App\Http\Controllers\Pay;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Pay\PaymentModel;
use App\Models\AdminCouponModel;
use Illuminate\Support\Facades\Redirect;

class PaymentController extends Controller
{
    //
    public function index()
    {
        if (Session::get('cart') != null) {
            return view('payment.thanhtoanv2');
        } else {
            return Redirect::to('/'); //Redirect::route('payment')
        }
    }

    public function payment(Request $request)
    {
        $iduser = $request->iduser;
        $name = $request->username;
        $phone = $request->phoneuser;
        $city = $request->city;
        $district = $request->district;
        $detai = $request->detail;
        $typepayment = $request->typepayment;
        $idproduct = $request->idproduct;
        $totalproduct = $request->total;
        $address = $city . '/' . $district;

        //dung
        // de anh hiu lay data de lam pdf
        if (Session::get('cart')) {
            foreach (Session::get('cart') as $k => $v) {
                $datapdf[] = array(
                    'iduser' => $iduser,
                    'name' => $name,
                    'phone' => $phone,
                    'city' => $city,
                    'district' => $district,
                    'typepayment' => $typepayment,
                    'session_id' => $v['session_id'],
                    'product_title' => $v['product_title'],
                    'product_id' => $v['product_id'],
                    'product_image' => $v['product_image'], //hieu-test
                    'product_qty' => $v['product_qty'],

                    'product_price' => $v['product_price'],
                    'test' => 'session trong data pdf'
                );
            }
        } else {
            return Redirect::to('/login');
        }
        Session::put("datapdf", $datapdf);
        // de anh hiu data de lam pdf
        //dung
        if (Session::get('coupon')) {
            DB::insert('insert into payment (IdUser, NameUser, PhoneUser, AddressUser,TypePayment,Time,Status,Coupon) values (?, ?, ?, ?, ?, ?, ?, ?)', [$iduser, $name, $phone, $address, 'cod', date('m'), 'Đang xử lý', Session::get('coupon')['coupon']]);
        } else {
            DB::insert('insert into payment (IdUser, NameUser, PhoneUser, AddressUser,TypePayment,Time,Status,Coupon) values (?, ?, ?, ?, ?, ?, ?, ?)', [$iduser, $name, $phone, $address, 'cod', date('m'), 'Đang xử lý', 'Không']);
        }
        $dataid = DB::table('payment')->orderBy('CodeOrder', 'desc')->limit(1)->get();

        if (Session::get('cart') != null) {
            foreach (Session::get('cart') as $id => $details) {
                DB::table('order_list_product')->insert(
                    // ['CodeOrder' => $dataid[0]->CodeOrder, 'IdProduct' => $details['product_id'], 'Quantity' => $details['product_qty'], 'Price' => $details['product_price'],"Time"=>date('m')]
                    ['CodeOrder' => $dataid[0]->CodeOrder, 'IdProduct' => $details['product_id'], 'NameProduct' => $details['product_title'], 'Quantity' => $details['product_qty'], 'Price' => $details['product_price'], "Time" => date('m')]
                );
                $quan = DB::table('admin_product_models')->where('id', $details['product_id'])->get();
                DB::table('admin_product_models')->where('id', $details['product_id'])->update(['quantity' => $quan[0]->quantity - $details['product_qty']]);
                if(Session::get('coupon')){
                    $coupon = DB::table('coupon')->where('coupon', Session::get('coupon')['coupon'])->get();
                    DB::table('coupon')->where('coupon', Session::get('coupon')['coupon'])->update(['quantity' => $coupon[0]->quantity - 1]);
                }
            };
            // dd(DB::table('admin_product_models')->where('id',$dataid[0]->CodeOrder)->get());
            // dd($coupon);
            // return $coupon;
        } else {
            return Redirect::to('/');
        }
    }



    //coupon
    public function addcoupon(Request $request)
    {
        if (Session::get('cart') != null) {
            $data = AdminCouponModel::where('coupon', $request->coupon)->first();
            if ($data != null) {
                if ($data['quantity'] > 0) {
                    if (Session::get('coupon') != null) {
                        if ($data != null) {
                            if (Session::get('coupon') != $data->coupon) {
                                Session::forget('coupon');
                                Session::put('coupon', $data);
                            }
                        }
                    } else {
                        Session::put('coupon', $data);
                    }
                    return Session::get('coupon');
                }
            } else {
                return null;
            }
        }
        // return Session::get('coupon');
    }


    //success
    public function success()
    {
        $lastdata = Session::get('cart');
        $datacoupon = Session::get('coupon');
        Session::forget('cart');
        Session::forget('coupon');
        Session::save();
        // dd($datacoupon->condition);
        if (isset($lastdata)) {
            return view('payment.success')->with(['data' => $lastdata, 'coupon' => $datacoupon]);
        } else {
            return Redirect::to('/');
        }
    }
}
