<?php

namespace App\Http\Controllers;

use App\ansprechpartner;
use Illuminate\Http\Request;

class AnsprechpartnerController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');

    }


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
     * @param  \App\ansprechpartner  $ansprechpartner
     * @return \Illuminate\Http\Response
     */
    public function show(ansprechpartner $ansprechpartner)
    {
        $ansprechpartner = ansprechpartner::find($ansprechpartner);
        return view('ansprechpartner.ansprechpartner',compact('ansprechpartner'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ansprechpartner  $ansprechpartner
     * @return \Illuminate\Http\Response
     */
    public function edit(ansprechpartner $ansprechpartner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ansprechpartner  $ansprechpartner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ansprechpartner $ansprechpartner)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ansprechpartner  $ansprechpartner
     * @return \Illuminate\Http\Response
     */
    public function destroy(ansprechpartner $ansprechpartner)
    {
        //
    }
}
