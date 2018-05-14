<?php

namespace App\Http\Controllers;

use App\firmen;
use Illuminate\Http\Request;

class Firmencontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\firmen  $firmen
     * @return \Illuminate\Http\Response
     */
    public function show(firmen $firmen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\firmen  $firmen
     * @return \Illuminate\Http\Response
     */
    public function edit(firmen $firmen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\firmen  $firmen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, firmen $firmen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\firmen  $firmen
     * @return \Illuminate\Http\Response
     */
    public function destroy(firmen $firmen)
    {
        //
    }


    public static function asArray()
    {
        $firmen = firmen::all();
        return $firmen;
    }
}
