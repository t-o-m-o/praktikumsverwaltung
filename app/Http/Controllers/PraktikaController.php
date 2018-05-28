<?php

namespace App\Http\Controllers;

use App\praktika;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        if (in_array(Auth::user()->typ, ['admin', 'employe'])) {
            return view('praktika.create');
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
        } else {
            return view('welcome');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\praktika $praktika
     * @return \Illuminate\Http\Response
     */
    public function show(praktika $praktika)
    {
        if (in_array(Auth::user()->typ, ['admin', 'employe'])) {
            return view('praktika.show', compact('praktika'));
        } else {
            return view('welcome');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\praktika $praktika
     * @return \Illuminate\Http\Response
     */
    public function edit(praktika $praktika)
    {
        if (in_array(Auth::user()->typ, ['admin', 'employe'])) {

            return view('praktika.edit', compact('praktika'));
        } else {
            return view('welcome');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\praktika $praktika
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, praktika $praktika)
    {
        if (in_array(Auth::user()->typ, ['admin', 'employe'])) {
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
        } else {
            return view('welcome');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\praktika $praktika
     * @return \Illuminate\Http\Response
     */
    public function destroy(praktika $praktika)
    {
        if (in_array(Auth::user()->typ, ['admin', 'employe'])) {
            try {
                $praktika->delete();
            } catch (\Exception $e) {
                return view('praktika.show', compact('praktika'))->withErrors($e->getMessage());
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
            $praktika = praktika::paginate(25);
            return view('praktika.index', compact('praktika'));
        } else {
            return view('welcome');
        }
    }
}
