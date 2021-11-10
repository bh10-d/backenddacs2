<?php

namespace App\Http\Controllers;

use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public static $datacookie;
    public function index()
    {
        //
    }

    public function details_product($product_id){
        $get_detail = DB::table('imagetables')->join('products','products.id','=',
        'imagetables.id_product')->where('products.id',$product_id)->get();

        return view('chitiet')->with('details',$get_detail);//detail
    }

    public static function cart_product(Request $request,$cart_id){
        $product_ordered = DB::table('products')->where('id','=',$cart_id)->get();
    
        // return view('cart')->with('info_ordered',$product_ordered);
        // $minute = 7;
       
        // $value = Cookie::get('name');;
        // if(strcmp($value,"") == 0){
        //     $value = $cart_id;
        // }else{
        //     $value .= '-' . $cart_id;
        // }

        // return response("jfdk")->cookie(
        //     'name',$value , $minute
        // );

        // Cookie::queue(Cookie::make('name',$value,$minute));
        
        
        // Cookie::queue(Cookie::forget('name')) 
        // $v = Cookie::get('name');
        // echo $v;
        // return view('cart');
    }

    public function getCookie(Request $request) {
        $value = $request->cookie('name');//Cookie::get('name');
    }
    
}
