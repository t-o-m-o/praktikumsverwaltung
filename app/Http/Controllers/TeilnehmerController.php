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
        $teilnehmer = teilnehmer::paginate(25);
        //$daten = ['one' => 'eins', 'two' => 'zwei','three' => 'drei'];
        return view('teilnehmer.teilnehmerliste', compact('teilnehmer'));
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
        return view('teilnehmer.show', compact('teilnehmer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\teilnehmer  $teilnehmer
     * @return \Illuminate\Http\Response
     */
    public function edit(teilnehmer $teilnehmer)
    {
        return view('teilnehmer.edit', compact('teilnehmer'));
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
        $request->validate([
            'vorname' => 'required',
            'nachname' => 'required',
            'berufsziel' => 'exists:berufsziel,Berufsziel_ID',
            'semester' => 'exists:semester,Semester_ID'
        ]);

        $teilnehmer->update(array(
            'Semester_ID' => request('semester'),
            'Berufsziel_ID' => request('berufsziel'),
            'Vorname' => request('vorname'),
            'Nachname' => request('nachname'))) ;
        $teilnehmer->save();
        return redirect(route('teilnehmer.show', $teilnehmer));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\teilnehmer  $teilnehmer
     * @return \Illuminate\Http\Response
     */
    public function destroy(teilnehmer $teilnehmer)
    {
        $teilnehmer->delete();
        return $this->index();
    }

    public static function asArray()
    {
        $teilnehmerl = teilnehmer::all();
        return $teilnehmerl;
    }
}
