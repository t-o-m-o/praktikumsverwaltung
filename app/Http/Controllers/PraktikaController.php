<?php

namespace App\Http\Controllers;

use App\ansprechpartnerliste;
use App\praktika;
use Illuminate\Http\Request;
use TheSeer\Tokenizer\Exception;

class Praktikacontroller extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
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

        $praktikum = new praktika;
        $praktikum->Teilnehmer_ID = request('teilnehmer');
        $praktikum->Firmen_ID = request('firma');
        $praktikum->Praktikumszeit_ID = request('zeit');
        $praktikum->Status = request('status');
        try {
            $praktikum->save();
        } catch (\Exception $e) {
            return view('praktika.create')->withErrors($e->getMessage());
        }
        return redirect(route('praktika.show', $praktikum));
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
            'Teilnehmer_ID' => request('teilnehmer'),
            'Firmen_ID' => request('firma'),
            'Praktikumszeit_ID' => request('zeit'),
            'Status' => request('status')
        ));
        try {
            $praktika->save();
        } catch (\Exception $e) {
            return view('praktika.edit', $praktika)->withErrors($e->getMessage());
        }

        return redirect(route('praktika.show', $praktika));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\praktika  $praktika
     * @return \Illuminate\Http\Response
     */
    public function destroy(praktika $praktika)
    {
        try {
            $praktika->delete();
        } catch (\Exception $e) {
            return view('praktika.show', compact('praktika'))->withErrors($e->getMessage());
        }
        return $this->index();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $praktika = praktika::paginate(25);
        return view('praktika.index', compact('praktika'));
    }
}
