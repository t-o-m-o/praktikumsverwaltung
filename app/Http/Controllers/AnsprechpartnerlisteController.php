<?php

namespace App\Http\Controllers;

use App\ansprechpartnerliste;
use App\Exceptions\Handeler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnsprechpartnerlisteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (in_array(Auth::user()->typ, ['admin', 'employe'])) {
            $ansprechpartnerliste = ansprechpartnerliste::paginate(25);
            return view('ansprechpartnerliste.index', compact('ansprechpartnerliste'));
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
            return view('ansprechpartnerliste.create');
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
        } else {
            return view('welcome');
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\ansprechpartnerliste $ansprechpartnerliste
     * @return \Illuminate\Http\Response
     */
    public function show(ansprechpartnerliste $ansprechpartnerliste)
    {
        if (in_array(Auth::user()->typ, ['admin', 'employe'])) {
            return view('ansprechpartnerliste.show', compact('ansprechpartnerliste'));
        } else {
            return view('welcome');

        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ansprechpartnerliste $ansprechpartnerliste
     * @return \Illuminate\Http\Response
     */
    public function edit(ansprechpartnerliste $ansprechpartnerliste)
    {
        if (in_array(Auth::user()->typ, ['admin', 'employe'])) {

            return view('ansprechpartnerliste.edit', compact('ansprechpartnerliste'));
        } else {
            return view('welcome');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\ansprechpartnerliste $ansprechpartnerliste
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ansprechpartnerliste $ansprechpartnerliste)
    {
        if (in_array(Auth::user()->typ, ['admin', 'employe'])) {
            $request->validate([
                'ansprechpartner' => 'exists:ansprechpartner,Ansprechpartner_ID',
                'firma' => 'exists:firmen,Firmen_ID',
                'ziel' => 'exists:berufsziel,Berufsziel_ID'
            ]);
            $ansprechpartnerliste->update(array(
                'Ansprechpartner_ID' => request('ansprechpartner'),
                'Firmen_ID' => request('firma'),
                'Berufsziel_ID' => request('ziel'),
            ));
            try {
                $ansprechpartnerliste->save();
            } catch (\Exception $e) {
                return view('ansprechpartnerliste.edit', $ansprechpartnerliste)->withErrors($e->getMessage());
            }
            return view('ansprechpartnerliste.show', compact('ansprechpartnerliste'));
        } else {
            return view('welcome');

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ansprechpartnerliste $ansprechpartnerliste
     * @return \Illuminate\Http\Response
     */
    public function destroy(ansprechpartnerliste $ansprechpartnerliste)
    {
        if (in_array(Auth::user()->typ, ['admin', 'employe'])) {
            try {
                $ansprechpartnerliste->delete();
            } catch (\Exception  $e) {
                return view('ansprechpartnerliste.show', $ansprechpartnerliste)->withErrors($e->getMessage());
            }
            return $this->index();
        } else {
            return view('welcome');
        }
    }
}
