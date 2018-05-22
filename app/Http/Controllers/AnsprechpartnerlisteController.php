<?php

namespace App\Http\Controllers;

use App\ansprechpartnerliste;
use Illuminate\Http\Request;

class AnsprechpartnerlisteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $ansprechpartner = ansprechpartnerliste::paginate(25);
      return view('ansprechpartnerliste.index', compact('ansprechpartnerliste'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('ansprechpartnerliste.create');
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
     * @param  \App\ansprechpartnerliste  $ansprechpartnerliste
     * @return \Illuminate\Http\Response
     */
    public function show(ansprechpartnerliste $ansprechpartnerliste)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ansprechpartnerliste  $ansprechpartnerliste
     * @return \Illuminate\Http\Response
     */
    public function edit(ansprechpartnerliste $ansprechpartnerliste)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ansprechpartnerliste  $ansprechpartnerliste
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ansprechpartnerliste $ansprechpartnerliste)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ansprechpartnerliste  $ansprechpartnerliste
     * @return \Illuminate\Http\Response
     */
    public function destroy(ansprechpartnerliste $ansprechpartnerliste)
    {
        //
    }
}
