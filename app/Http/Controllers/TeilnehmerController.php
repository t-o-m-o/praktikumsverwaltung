<?php

namespace App\Http\Controllers;

use App\teilnehmer;
use Illuminate\Http\Request;

class TeilnehmerController extends Controller
{
    public static function asArray()
    {
        return teilnehmer::all();
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
        $teilnehmer->Berufsziel_ID = request('berufsziel');
        $teilnehmer->Semester_ID = request('semester');
        $teilnehmer->Vorname = request('vorname');
        $teilnehmer->Nachname = request('nachname');
        try {
            $teilnehmer->save();
        } catch (\Exception $e) {
            return view('teilnehmer.edit', $teilnehmer)->withErrors($e->getMessage());
        }
        return view('teilnehmer.show', compact('teilnehmer'));
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
        try {
            $teilnehmer->save();
        } catch (\Exception $e) {
            return view('teilnehmer.edit', $teilnehmer)->withErrors($e->getMessage());
        }
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
        try {
            $teilnehmer->delete();
        } catch (\Exception  $e) {
            return view('teilnehmer.show', compact('teilnehmer'))->withErrors($e->getMessage());
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
        $teilnehmer = teilnehmer::paginate(25);
        //$daten = ['one' => 'eins', 'two' => 'zwei','three' => 'drei'];
        return view('teilnehmer.index', compact('teilnehmer'));
    }
}
