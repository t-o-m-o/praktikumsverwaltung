<?php

namespace App\Http\Controllers;

use App\kontaktliste;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KontaklisteController extends Controller
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
        if (in_array(Auth::user()->typ, ['admin', 'employe'])) {
            return view('kontaktliste.create');
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
        } else {
            return view('welcome');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\kontaktliste $kontaktliste
     * @return \Illuminate\Http\Response
     */
    public function show(kontaktliste $kontaktliste)
    {
        if (in_array(Auth::user()->typ, ['admin', 'employe'])) {
            return view('kontaktliste.show', compact('kontaktliste'));
        } else {
            return view('welcome');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\kontaktliste $kontaktliste
     * @return \Illuminate\Http\Response
     */
    public function edit(kontaktliste $kontaktliste)
    {
        if (in_array(Auth::user()->typ, ['admin', 'employe'])) {
            return view('kontaktliste.edit', compact('kontaktliste'));
        } else {
            return view('welcome');
        }
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
        if (in_array(Auth::user()->typ, ['admin', 'employe'])) {
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
        } else {
            return view('welcome');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\kontaktliste $kontaktliste
     * @return \Illuminate\Http\Response
     */
    public function destroy(kontaktliste $kontaktliste)
    {
        if (in_array(Auth::user()->typ, ['admin', 'employe'])) {
            try {
                $kontaktliste->delete();
            } catch (\Exception  $e) {
                return view('kontaktliste.show', compact('kontaktliste'))->withErrors($e->getMessage());
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
            $kontaktliste = kontaktliste::paginate(25);
            return view('kontaktliste.index', compact('kontaktliste'));
        } else {
            return view('welcome');
        }
    }
}
