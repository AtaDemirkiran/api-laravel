<?php

namespace App\Http\Controllers;

use App\Models\Haber;
use Illuminate\Http\Request;

class HaberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news=Haber::all();
        
        return view ('news.index',compact('news'));
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
        $new=Haber::find($id);

        return view('news.detail',compact('new'));
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
        $new=Haber::find($id);
        $new->name=$request->name;
        
        $new->goster_slider = $request->has('goster_slider') && $request->has('goster_slider') == 1 ? 1 : 0;
        $new->goster_gunun_firsati = $request->has('goster_gunun_firsati') && $request->has('goster_gunun_firsati') == 1 ? 1 : 0;
        $new->goster_one_cikan = $request->has('goster_one_cikan') && $request->has('goster_one_cikan') == 1 ? 1 : 0;

        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('images/', $filename);
            $new->img = $filename;
        }

        $new->save();
        return redirect ('/news');

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
