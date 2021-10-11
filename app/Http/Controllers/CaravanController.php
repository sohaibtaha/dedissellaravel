<?php

namespace App\Http\Controllers;
use App\Models\Caravan;
use Illuminate\Http\Request;

class CaravanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Caravan::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'platenumber'=>'required',
            'capacity'=>'required',
            'chassisnumber'=>'required'

        ]);


        return Caravan::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Caravan::find($id);
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
        $caravan = Caravan::find($id);
        $caravan ->update($request->all());
        return $caravan;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Caravan::destroy($id);
    }

    public function search($name)
    {
       return Caravan::where('name','like','%'.$name.'%')->get();
    }
}
