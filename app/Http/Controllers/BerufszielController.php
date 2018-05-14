<?php

namespace App\Http\Controllers;

use App\berufsziel;
use Illuminate\Http\Request;

class BerufszielController extends Controller
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
     * @param  \App\berufsziel  $berufsziel
     * @return \Illuminate\Http\Response
     */
    public function show(berufsziel $berufsziel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\berufsziel  $berufsziel
     * @return \Illuminate\Http\Response
     */
    public function edit(berufsziel $berufsziel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\berufsziel  $berufsziel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, berufsziel $berufsziel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\berufsziel  $berufsziel
     * @return \Illuminate\Http\Response
     */
    public function destroy(berufsziel $berufsziel)
    {
        //
    }

    public static function asArray()
    {
        $zielliste = berufsziel::all();
        return $zielliste;
    }
}
