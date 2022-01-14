<?php

namespace App\Http\Controllers;

use App\Models\AdminProductModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Products;

class HomepageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
        $allproduct = AdminProductModel::all();
        $getimages = DB::table('admin_product_models')->select('id')->get();
        // $images = [];
        // foreach ($getimages[0] as $id => $image) {
            
        // }

        for($i = 0; $i < count($getimages); $i++) {
            $images[$i] = DB::table('imagetables')->select('image')->where('id_product',$getimages[$i]->id)->get();   
        }
        return view('homepage')->with(['allproduct'=>$allproduct]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
