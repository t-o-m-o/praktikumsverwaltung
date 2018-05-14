<?php

namespace App\Http\Controllers;

use App\praktikazeitraeume;
use Illuminate\Http\Request;

class Praktikazeitraeumecontroller extends Controller
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
     * @param  \App\praktikazeitraeume  $praktikazeitraeume
     * @return \Illuminate\Http\Response
     */
    public function show(praktikazeitraeume $praktikazeitraeume)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\praktikazeitraeume  $praktikazeitraeume
     * @return \Illuminate\Http\Response
     */
    public function edit(praktikazeitraeume $praktikazeitraeume)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\praktikazeitraeume  $praktikazeitraeume
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, praktikazeitraeume $praktikazeitraeume)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\praktikazeitraeume  $praktikazeitraeume
     * @return \Illuminate\Http\Response
     */
    public function destroy(praktikazeitraeume $praktikazeitraeume)
    {
        //
    }

    public static function asArray()
    {
        $zeitraueme = praktikazeitraeume::all();
        return $zeitraueme;
    }
}
