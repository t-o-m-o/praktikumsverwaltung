<?php

namespace App\Http\Controllers;

use App\teilnehmer;
use Illuminate\Http\Request;

class TeilnehmerController extends Controller
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
        return view('teilnehmer.create');
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
            'ziel' => 'exists:berufsziel,Berufsziel_ID',
            'semester' => 'exists:semester,Semester_ID',
            'vorname' => 'required',
            'nachname' => 'required'
        ]);

        $teilnehmer = new teilnehmer();
        $teilnehmer->Berufsziel_ID = request('ziel');
        $teilnehmer->Semester_ID = request('semester');
        $teilnehmer->Vorname = request('vorname');
        $teilnehmer->Nachname = request('nachname');
        $teilnehmer->save();
        redirect('/public/praktika/praktikaliste/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\teilnehmer  $teilnehmer
     * @return \Illuminate\Http\Response
     */
    public function show(teilnehmer $teilnehmer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\teilnehmer  $teilnehmer
     * @return \Illuminate\Http\Response
     */
    public function edit(teilnehmer $teilnehmer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\teilnehmer  $teilnehmer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, teilnehmer $teilnehmer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\teilnehmer  $teilnehmer
     * @return \Illuminate\Http\Response
     */
    public function destroy(teilnehmer $teilnehmer)
    {
        //
    }

    public static function asArray()
    {
        $teilnehmerl = teilnehmer::all();
        return $teilnehmerl;
    }
}
