<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\AdminProductModel;
use Illuminate\Support\Facades\Redirect;

class AdminProductController extends Controller
{
    public function index()
    {
        $product = AdminProductModel::get();
        return view('admin/product.product')->with('product', $product);
        // return view('admin.product.product');
        // $data = AdminProductModel::paginate(5);
        // return view('admin.product.product', compact('data'));
    }

    public function afterindex(){
        $product = AdminProductModel::get();
        return view('admin/product.producttable')->with('product', $product);
    }


    // function fetch_data(Request $request)
    // {
    //     if ($request->ajax()) {
    //         $data = AdminProductModel::paginate(5);
    //         return view('admin.product.producttable', compact('data'))->render();
    //     }
    // }

    public function Upload(Request $request)
    {
        if ($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;

            $request->file('upload')->move(public_path('image'), $fileName);

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('image/' . $fileName); //$url = asset('public/image/'.$fileName);
            $msg = "Image uploaded successfully";
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum,'$url','$msg')</script>";

            @header('Content-Type: text/html; charset=UTF-8');
            echo $response;
        }
    }

    public function test(Request $request){
        $data = $request->id;
        $allProduct = AdminProductModel::find($data);

        $image = $allProduct['image'];
        $get = [];
        if($image!=null){
            $get = explode('-', $image);
        }else{
            $get = $image;
        }
        return view("admin.test")->with('data',$get);
    }

    public static function GetImages()
    {
        $gopfile = '';
        if (count($_FILES["file"]["name"]) > 0) {
            sleep(3);
            for ($count = 0; $count < count($_FILES["file"]["name"]); $count++) {
                $file_name = $_FILES["file"]["name"][$count];
                $tmp_name = $_FILES["file"]['tmp_name'][$count];
                
                if($count==0){
                    $gopfile .= $file_name; 
                }else{
                    $gopfile = $gopfile . '-' . $file_name;
                }
                $location = 'image/'.$file_name;//asset('image/'.$file_name);//'image/' . $file_name;
                move_uploaded_file($tmp_name, $location);
            }
        }  
        $response = new Response();
        return $response->withCookie(cookie()->forever('image', $gopfile));   
    }

    public static function UploadProduct(Request $request)
    {
        $id = $request->id;
        $name = $request->name;
        $category = $request->category;
        $price = $request->price;
        $quantity = $request->quantity;
        $description = $request->description;
        if ($category == 1) $category = 'dienthoai';
        if ($category == 2) $category = 'maytinh';
        if ($category == 3) $category = 'phukien';

        $image = $request->cookie('image');

        DB::insert('insert into admin_product_models (code, productname, productcate, price, quantity, description) values (?, ?, ?, ?, ?, ?)', [$id, $name, $category, $price, $quantity,$description]);
        
        
        
        $dataid = DB::table('admin_product_models')->orderBy('id', 'desc')->limit(1)->get();
        
        // $id_product = DB::table('admin_product_models')->select('id')->where('code',[$id])->first();
        $id_product = AdminProductModel::where('code', $id)->first();
        $id_test = $dataid[0]->id;

        $all_img = explode("-", $image);
        foreach($all_img as $img){
            DB::table('imagetables')->insert(
                ['id_product' => $id_test, 'image' => '/image/'.$img]
            );
        };


        $data = new AdminProductController();
        $response = new Response();
        $response->withCookie(cookie('image', null, 0));
        return $data->afterindex();
        // dd($id_product);
        // return $id_product[0];
    }


    public function edit($product_id){
        $data = DB::table('admin_product_models')->where('id',$product_id)->get();
        // dd($data);
        return view('admin.product.editproduct')->with('data',$data);
    }

    public function editaccept(Request $request){
        $id = $request->id;
        $name = $request->name;
        $price = $request->price;
        $quantity = $request->quantity;
        DB::table('admin_product_models')->where('code', $id)->update(['productname' => $name, 'price' => $price, 'quantity' => $quantity]);
        // return Redirect::to('/product');
    }

    public function delete($id){
        DB::table('admin_product_models')->where('id',$id)->delete();
        DB::table('imagetables')->where('id_product',$id)->delete();
        return Redirect::to('/product');
    }

}
