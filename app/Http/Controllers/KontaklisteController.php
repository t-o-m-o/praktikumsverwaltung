<?php

namespace App\Http\Controllers;

use App\kontaktliste;
use Illuminate\Http\Request;

class KontaklisteController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kontaktliste.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['datum' => 'date',
            'praktikum' => 'exists:praktika,Praktikum_ID',
            'beschreibung' => 'required'
        ]);
        $kontaktliste = new kontaktliste;
        $kontaktliste->Praktikum_ID = request('praktikum');
        $kontaktliste->Kontaktbeschreibung = request('beschreibung');
        $kontaktliste->Datum = request('datum');
        try {
            $kontaktliste->save();
        } catch (\Exception $e) {
            return view('kontaktliste.create')->withErrors($e->getMessage());
        }
        return redirect(route('kontaktliste.show', $kontaktliste));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\kontaktliste $kontaktliste
     * @return \Illuminate\Http\Response
     */
    public function show(kontaktliste $kontaktliste)
    {
        return view('kontaktliste.show', compact('kontaktliste'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\kontaktliste $kontaktliste
     * @return \Illuminate\Http\Response
     */
    public function edit(kontaktliste $kontaktliste)
    {
        return view('kontaktliste.edit', compact('kontaktliste'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\kontaktliste $kontaktliste
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, kontaktliste $kontaktliste)
    {
        $request->validate(['datum' => 'date',
            'praktikum' => 'exists:praktika,Praktikum_ID',
            'beschreibung' => 'required'
        ]);

        $kontaktliste->update(
            array('Praktikum_ID' => request('praktikum'),
                'Kontaktbeschreibung' => request('beschreibung'),
                'Datum' => request('datum')
            ));
        try {
            $kontaktliste->save();
        } catch (\Exception $e) {
            return view('kontaktliste.edit', $kontaktliste)->withErrors($e->getMessage());
        }
        return redirect(route('kontaktliste.show', $kontaktliste));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\kontaktliste $kontaktliste
     * @return \Illuminate\Http\Response
     */
    public function destroy(kontaktliste $kontaktliste)
    {
        try {
            $kontaktliste->delete();
        } catch (\Exception  $e) {
            return view('kontaktliste.show', compact('kontaktliste'))->withErrors($e->getMessage());
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
        $kontaktliste = kontaktliste::paginate(25);
        return view('kontaktliste.index', compact('kontaktliste'));
    }
}
