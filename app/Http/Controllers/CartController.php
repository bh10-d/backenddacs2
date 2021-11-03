<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CartController extends Controller
{
    //
    public function rollback_cart(){
        return Redirect::to('/cart');
    } 

    public function save_cart(Request $request){
        $productId = $request->productid_hidden;
        $quantity = $request->qty;
        



    }
}
