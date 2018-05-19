<?php

namespace App\Http\Controllers;

use App\ansprechpartner;
use Illuminate\Http\Request;

class AnsprechpartnerController extends Controller
{

    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ansprechpartner.create');
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
            'name' => 'required',
            'vorname' => 'required'
        ]);

        $ansprechpartner = new ansprechpartner;
        $ansprechpartner->Vorname = request('vorname');
        $ansprechpartner->Nachname = request('name');
        $ansprechpartner->Telefon = request('telefon');
        $ansprechpartner->Email = request('email');
        try {
            $ansprechpartner->save();
        } catch (\Exception $e) {
            return view('ansprechpartner.create')->withErrors($e->getMessage());
        }
        return redirect(route('ansprechpartner.show', $ansprechpartner));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ansprechpartner  $ansprechpartner
     * @return \Illuminate\Http\Response
     */
    public function show(ansprechpartner $ansprechpartner)
    {
        return view('ansprechpartner.show', compact('ansprechpartner'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ansprechpartner  $ansprechpartner
     * @return \Illuminate\Http\Response
     */
    public function edit(ansprechpartner $ansprechpartner)
    {
        return view('ansprechpartner.edit', compact('ansprechpartner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ansprechpartner  $ansprechpartner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ansprechpartner $ansprechpartner)
    {
        $request->validate([
            'name' => 'required',
            'vorname' => 'required'
        ]);

        $ansprechpartner->update(array(
            'Vorname' => request('vorname'),
            'Nachname' => request('name'),
            'Telefon' => request('telefon'),
            'Email' => request('email')
        ));
        try {
            $ansprechpartner->save();
        } catch (\Exception $e) {
            return view('ansprechpartner.edit', $ansprechpartner)->withErrors($e->getMessage());
        }

        return redirect(route('ansprechpartner.show', compact('ansprechpartner')));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ansprechpartner  $ansprechpartner
     * @return \Illuminate\Http\Response
     */
    public function destroy(ansprechpartner $ansprechpartner)
    {
        try {
            $ansprechpartner->delete();
        } catch (\Exception  $e) {
            return view('ansprechpartner.show', compact('ansprechpartner'))->withErrors($e->getMessage());
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
        $ansprechpartner = ansprechpartner::paginate(25);
        return view('ansprechpartner.index', compact('ansprechpartner'));
    }
}
