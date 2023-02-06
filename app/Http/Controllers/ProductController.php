<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //  POSTMANDA GET İLE TÜM VERİLERİ ALMA URL'DEKİ api KISMINI ATLAMA SAKIN http://127.0.0.1:8000/api/products/
        $products=Product::all();
        
        return $products;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // POSTMAN POST İLE VERİ EKLEME URL'DEKİ api KISMINI ATLAMA SAKIN http://127.0.0.1:8000/api/products/
        $product=new Product();
        
        $product->name=$request->name;
        $product->price=$request->price;

        $product->save();

        return $product;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        //  ÖRNEK POSTMAN GET İLE PRODUCT GÖSTERME URL'DEKİ APİ KISMINI ATLAMA http://127.0.0.1:8000/api/products/3
        $product=Product::find($id);

        return $product;
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

        // ÖRNEK POSTMAN PUT İLE VERİ GÜNCELLEME http://127.0.0.1:8000/api/products/3 url'deki api kısmını atlama
        $product=Product::find($id);

        $product->name=$request->name;
        $product->price=$request->price;

        $product->save();
        
        return $product;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product=Product::find($id);
         
        $product->delete();

    }
}
