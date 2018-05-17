<?php

namespace App\Http\Controllers;

use App\firmen;
use Illuminate\Http\Request;

class FirmenController extends Controller
{
    public static function asArray()
    {
        $firmen = firmen::all();
        return $firmen;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('firmen.create');
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
            'name' => 'required',
            'ort' => 'required',
            'plz' => 'bail|numeric|between:0,99999',
            'strasse' => 'required'
        ]);

        $firma = new firmen;
        $firma->Firmenname = request('name');
        $firma->Firmenbezeichnung = request('bezeichnung');
        $firma->Firmenwebseite = request('webseite');
        $firma->Email = request('email');
        $firma->Ort = request('ort');
        $firma->PLZ = request('plz');
        $firma->Strasse = request('strasse');
        $firma->Telefon = request('telefon');
        $firma->save();
        return redirect(route('firmen.show', $firma));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\firmen $firmen
     * @return \Illuminate\Http\Response
     */
    public function show(firmen $firmen)
    {
        return view('firmen.show', compact('firmen'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\firmen  $firmen
     * @return \Illuminate\Http\Response
     */
    public function edit(firmen $firmen)
    {
        return view('firmen.edit', compact('firmen'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\firmen  $firmen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, firmen $firmen)
    {
        $request->validate([
            'name' => 'required',
            'ort' => 'required',
            'plz' => 'bail|numeric|between:0,99999',
            'strasse' => 'required'
        ]);

        $firmen->update(array(
            'Firmenname' => request('name'),
            'Firmenbezeichnung' => request('bezeichnung'),
            'Firmenwebseite' => request('webseite'),
            'Email' => request('email'),
            'Ort' => request('ort'),
            'PLZ' => request('plz'),
            'Strasse' => request('strasse'),
            'Telefon' => request('telefon')
        ));
        $firmen->save();
        return redirect(route('firmen.show', $firmen));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\firmen  $firmen
     * @return \Illuminate\Http\Response
     */
    public function destroy(firmen $firmen)
    {
        $firmen->delete();
        return $this->index();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $firmen = firmen::paginate(25);
        return view('firmen.index', compact('firmen'));
    }
}
