<?php

namespace App\Http\Controllers;

use App\Models\AdminProductModel;
use App\Models\Products;
// use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session as FacadesSession;
use PDF;

class AjaxController extends Controller
{

    public function index()
    {
        $products = Products::all();
        return view('products')->with('products', $products);
    }

    public function cart(Request $request)
    {

        return view('carttwo');

    }

    public function remove(Request $request){ //  ham nay can phai sua lai co bug
        if($request->id) {
            // $cart = Cookie::get('cart');
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                // Cookie::queue('cart', $cart,43200);
                session()->put('cart',$cart);
            }
            session()->flash('success', 'Product removed successfully');
        }

    }

    public function add_cart_ajax(Request $request)
    {
        $data = $request->all();
        $session_id = substr(md5(microtime()), rand(0, 26), 5);
        $cart = Session::get('cart');
        $is_available = 0;
        $quantity = 0;
        

        if($cart == true){
            foreach($cart as $key => $value){
                if($data['cart_product_id'] == $value['product_id']){
                    $is_available++;
                    $cart[$key]['product_qty']++;
                }
            }
            if($is_available==0){
                $cart[] = array(
                    'session_id' => $session_id,
                    'product_title' => $data['cart_product_title'],
                    'product_id' => $data['cart_product_id'],
                    'product_image' => $data['cart_product_image'],//hieu-test
                    'product_qty' => $data['cart_product_qty'],
                    'product_price' => $data['cart_product_price'],
                    'test' => 'them product nhung la laan 2 tro di'
                );
            }

        }else{
            $cart[] = array(
                'session_id' => $session_id,
                'product_title' => $data['cart_product_title'],
                'product_id' => $data['cart_product_id'],
                'product_image' => $data['cart_product_image'],//hieu-test
                'product_qty' => $data['cart_product_qty'],
                'product_price' => $data['cart_product_price'],
                'test' => 'session nay cap nhat lai tu dau o else'
            );
        }

        Session::put('cart', $cart);
        // Session::forget('cart');
        Session::save();
    }
    
    public function update_cart_ajax(Request $request)
    {
        $data = $request->all();
        $cart = Session::get('cart');
        $is_available_update = 0;

        foreach($cart as $key => $value){
            if($data['id'] == $value['product_id']){
                $is_available_update++;
                $cart[$key]['product_qty'] = $data['qty'];
            }
        }
        Session::put('cart',$cart);
        Session::save();

    }
    public function search(Request $request){
        $products = AdminProductModel::all();
        return view('show_all')->with('products',$products);
    }

    public function search_ajax(Request $request){
        $data = $request->all();
        
        
        if($data['query']){
            $products = AdminProductModel::where('productname','like','%'.$data['query'].'%');
            $output = '<div style="width:90% !important;margin:80px auto; display: flex !important; flex-direction:row !important; flex-wrap: wrap !important;" >';
            
            if($products->exists()) {

            
                foreach($products->get() as $key => $value){
                    // $output .=  $value->title;
                    
                    $output .=  
                        '<div style="width: 250px !important; border: 1px solid #000 !important;">
                            <div style="width: 100%;">
                                <img style="width:100%; height: auto;" 
                                src="image/ipad-pro.jpg" alt="Avatar">
                            </div>
                            
                            <h4><a href="{{URL::to('.'/detail-product/$value->id'.')}}">' . $value->productname . '</a></h4> 
                            <p>' . $value->price . 'd</p> 
                        </div>'; 
                    
                }
            }else{
                $output .= "<p>deo thay ket qua mo het</p>";
            }
        }
        $output .= '</div>';
        echo $output;
    }

    public function show_all_products(Request $request)
    {
        $data = $request->all();
        $products = AdminProductModel::all();
        
        $output = '<div style="width:90% !important;margin:80px auto; display: flex !important; flex-direction:row !important; flex-wrap:wrap !important">';
        foreach($products as $product) {
            $output .=  
                        '<div style="width: 250px !important; border: 1px solid #000 !important;">
                            <div style="width: 100%;">
                                <img style="width:100%; height: auto;" 
                                src="image/ipad-pro.jpg" alt="Avatar">
                            </div>
                            
                            <h4><a href="{{URL::to('.'/detail-product/$value->id'.')}}">' . $product->productname . '</a></h4> 
                            <p>' . $product->price . 'd</p> 
                        </div>'; 
        }

        $output .= '</div>';
        echo $output;

    }


    public function createPDF($id_product){
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($this->contentPDF($id_product));
        return $pdf->stream();
    }
    public function contentPDF($id_product){
        
    }
}
