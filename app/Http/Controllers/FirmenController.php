<?php

namespace App\Http\Controllers;

use App\firmen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FirmenController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public static function asArray()
    {
        if (in_array(Auth::user()->typ, ['admin', 'employe'])) {
            return firmen::all();
        } else {
            return view('welcome');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (in_array(Auth::user()->typ, ['admin', 'employe'])) {
            return view('firmen.create');
        } else {
            return view('welcome');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (in_array(Auth::user()->typ, ['admin', 'employe'])) {
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
            try {
                $firma->save();
            } catch (\Exception $e) {
                return view('firmen.create')->withErrors($e->getMessage());
            }

            return redirect(route('firmen.show', $firma));
        } else {
            return view('welcome');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\firmen $firmen
     * @return \Illuminate\Http\Response
     */
    public function show(firmen $firmen)
    {
        if (in_array(Auth::user()->typ, ['admin', 'employe'])) {
            return view('firmen.show', compact('firmen'));
        } else {
            return view('welcome');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\firmen $firmen
     * @return \Illuminate\Http\Response
     */
    public function edit(firmen $firmen)
    {
        if (in_array(Auth::user()->typ, ['admin', 'employe'])) {
            return view('firmen.edit', compact('firmen'));
        } else {
            return view('welcome');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\firmen $firmen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, firmen $firmen)
    {
        if (in_array(Auth::user()->typ, ['admin', 'employe'])) {
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
            try {
                $firmen->save();
            } catch (\Exception $e) {
                return view('firmen.edit', $firmen)->withErrors($e->getMessage());
            }

            return redirect(route('firmen.show', $firmen));
        } else {
            return view('welcome');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\firmen $firmen
     * @return \Illuminate\Http\Response
     */
    public function destroy(firmen $firmen)
    {
        if (in_array(Auth::user()->typ, ['admin', 'employe'])) {
            try {
                $firmen->delete();
            } catch (\Exception $e) {
                return view('firmen.show', compact('firmen'))->withErrors($e->getMessage());
            }

            return $this->index();
        } else {
            return view('welcome');
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (in_array(Auth::user()->typ, ['admin', 'employe'])) {
            $firmen = firmen::paginate(25);
            return view('firmen.index', compact('firmen'));
        } else {
            return view('welcome');
        }
    }
}
