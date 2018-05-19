<?php

namespace App\Http\Controllers;

use App\ansprechpartnerliste;
use App\Exceptions\Handeler;
use App\Exceptions\Handler;
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
        //
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
        $request->validate([
            'ansprechpartner' => 'exists:ansprechpartner,Ansprechpartner_ID',
            'firma' => 'exists:firmen,Firmen_ID',
            'ziel' => 'exists:berufsziel,Berufsziel_ID'
        ]);

        $ansprechpartnerl = new ansprechpartnerliste;
        $ansprechpartnerl->Ansprechpartner_ID = request('ansprechpartner');
        $ansprechpartnerl->Firmen_ID = request('firma');
        $ansprechpartnerl->Berufsziel_ID = request('ziel');
        try {
            $ansprechpartnerl->save();
        } catch (\Exception  $e) {
            return view('ansprechpartnerliste.create')->withErrors($e->getMessage());
        }

        return view('ansprechpartnerliste.create');
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
        try {
            $ansprechpartnerliste->delete();
        } catch (\Exception  $e) {
            return view('ansprechpartner.show', $ansprechpartnerliste->ansprechpartner)->withErrors($e->getMessage());
        }
        return url();
    }
}
