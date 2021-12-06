<?php

namespace App\Http\Controllers\Pay;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
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
        
        //dung
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
        }else{
            return Redirect::to('/login');
        }
        Session::put("datapdf",$datapdf);
        // de anh hiu data de lam pdf
        //dung

        DB::insert('insert into payment (IdUser, NameUser, PhoneUser, AddressUser,TypePayment,Time,Status) values (?, ?, ?, ?, ?, ?, ?)', [$iduser, $name, $phone, $address,'cod',date('m'),'Đang xử lý']);
        $dataid = DB::table('payment')->orderBy('CodeOrder', 'desc')->limit(1)->get();
        
        if(Session::get('cart')!=null) {
            foreach(Session::get('cart') as $id => $details){
                DB::table('order_list_product')->insert(
                    // ['CodeOrder' => $dataid[0]->CodeOrder, 'IdProduct' => $details['product_id'], 'Quantity' => $details['product_qty'], 'Price' => $details['product_price'],"Time"=>date('m')]
                    ['CodeOrder' => $dataid[0]->CodeOrder, 'IdProduct' => $details['product_id'],'NameProduct' => $details['product_title'], 'Quantity' => $details['product_qty'], 'Price' => $details['product_price'],"Time"=>date('m')]
                );
                $quan = DB::table('admin_product_models')->where('id',$details['product_id'])->get();
                DB::table('admin_product_models')->where('id',$details['product_id'])->update(['quantity'=>$quan[0]->quantity - $details['product_qty']]);
            };
            // dd(DB::table('admin_product_models')->where('id',$dataid[0]->CodeOrder)->get());
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
