<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\profile;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return profile::with('user')->get();
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
        $pro = new profile();
        $pro->city = $request->city;
        $pro->country = $request->country;
        $pro->user_id = $request->user_id;

        $pro->save();
        return response()->json("Profile Created");
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
        return profile::findOrFail($id);
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
        $pro = Profile::findOrFail($id);
        $pro->city = $request->city;
        $pro->country = $request->country;
        $pro->user_id = $request->user_id;

        $pro->save();
        return response()->json("Profile Update");
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
        return profile::destroy($id);
    }
}
