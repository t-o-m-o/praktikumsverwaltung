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
     * @param  \Illuminate\Http\Request $request
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
        redirect(route('praktika.show', compact($praktikum)));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\praktika $praktika
     * @return \Illuminate\Http\Response
     */
    public function show(praktika $praktika)
    {
        return view('praktika.show', compact('praktika'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\praktika  $praktika
     * @return \Illuminate\Http\Response
     */
    public function edit(praktika $praktika)
    {

        return view('praktika.edit', compact('praktika'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\praktika  $praktika
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, praktika $praktika)
    {
        $request->validate([
            'teilnehmer' => 'exists:teilnehmer,Teilnehmer_ID',
            'firma' => 'exists:firmen,Firmen_ID',
            'zeit' => 'exists:praktikazeitraeume,Praktikumszeit_ID',
            'status' => 'required'
        ]);

        $praktika->update(array(
            'Firmen_ID' => request('firma'),
            'Praktikumszeit_ID' => request('firma'),
            'Status' => request('status')));
        $praktika->save();
        redirect(route('praktika.show', $praktika));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\praktika  $praktika
     * @return \Illuminate\Http\Response
     */
    public function destroy(praktika $praktika)
    {
        $praktika->delete();
        //redirect(route('praktika'));
        $this->index();
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
        return view('praktika.praktikaliste', compact('praktika'));
    }
}
