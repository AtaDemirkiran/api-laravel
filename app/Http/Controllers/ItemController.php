<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Item;



class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items=Item::all(); 
        
        return $items;
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item=new Item();

        $item->name=$request->name;
        $item->desc=$request->desc;
        $item->quantity=$request->quantity;

        $item->save();

        return $item;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item=Item::find($id);

        return $item;
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
        $item=Item::findOrFail($request->id);

         
        $item->name=$request->name;
        $item->desc=$request->desc;
        $item->quantity=$request->quantity;

        

        return $item;   
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item=Item::destroy($id);

        return response()->json(['message'=>'eleman silindi']);
    }
}
