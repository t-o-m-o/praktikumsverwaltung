<?php

namespace App\Http\Controllers;

use App\praktika;
use Illuminate\Http\Request;

class Praktikacontroller extends Controller
{

    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $praktika = praktika::paginate(25);
        //$daten = ['one' => 'eins', 'two' => 'zwei','three' => 'drei'];
        return view('praktika.praktikaliste',compact('praktika'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('praktika.create');
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
            'teilnehmer' => 'exists:teilnehmer,Teilnehmer_ID',
            'firma' => 'exists:firmen,Firmen_ID',
            'zeit' => 'exists:praktikazeitraeume,Praktikumszeit_ID',
            'status' => 'required'
        ]);

        $praktikum = new Praktika;
        $praktikum->Teilnehmer_ID = request('teilnehmer');
        $praktikum->Firmen_ID = request('firma');
        $praktikum->Praktikumszeit_ID = request('zeit');
        $praktikum->Status = request('status');
        $praktikum->save();
        redirect('/public/praktika/praktikaliste/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\praktika  $praktika
     * @return \Illuminate\Http\Response
     */
    public function show(praktika $praktika)
    {
        $praktikum = praktika::where('Praktikum_ID', $praktika->Praktikum_ID)->first();
        return view('praktika.show',compact('praktikum'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\praktika  $praktika
     * @return \Illuminate\Http\Response
     */
    public function edit(praktika $praktika)
    {
      $praktikum = praktika::where('Praktikum_ID', $praktika->Praktikum_ID)->first();
      return view('praktika.edit',compact('praktikum'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\praktika  $praktika
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, praktika $praktika)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\praktika  $praktika
     * @return \Illuminate\Http\Response
     */
    public function destroy(praktika $praktika)
    {
        //
    }
}
