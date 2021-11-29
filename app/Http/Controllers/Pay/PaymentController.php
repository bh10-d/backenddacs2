<?php

namespace App\Http\Controllers\Pay;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Pay\PaymentModel;
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
        $address = $city.'/'.$district;
        

        // de anh hiu lay data de lam pdf
        if(Session::get('cart')){
            foreach(Session::get('cart') as $k => $v){
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
                            'product_image' => $v['product_image'],//hieu-test
                            'product_qty' => $v['product_qty'],
                            
                            'product_price' => $v['product_price'],
                            'test' => 'session trong data pdf'
                        );

            }
        }
        

        Session::put("datapdf",$datapdf);
        // de anh hiu data de lam pdf


        DB::insert('insert into payment (IdUser, NameUser, PhoneUser, AddressUser,TypePayment) values (?, ?, ?, ?, ?)', [$iduser, $name, $phone, $address,'cod']);
        $dataid = DB::table('payment')->orderBy('CodeOrder', 'desc')->limit(1)->get();
        
        if(Session::get('cart')!=null) {
            foreach(Session::get('cart') as $id => $details){
                DB::table('order_list_product')->insert(
                    ['CodeOrder' => $dataid[0]->CodeOrder, 'IdProduct' => $details['product_id'], 'Quantity' => $details['product_qty'], 'Price' => $details['product_price']]
                );
            };
        }else{
            return Redirect::to('/');
        }
    }

    public function success()
    {
        $lastdata = Session::get('cart');
        Session::forget('cart');
        Session::save();
        if (isset($lastdata)) {
            return view('payment.success')->with('data', $lastdata);
        } else {
            return Redirect::to('/');
        }
    }
}
