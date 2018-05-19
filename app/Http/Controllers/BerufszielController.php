<?php

namespace App\Http\Controllers;

use App\berufsziel;
use Illuminate\Http\Request;

class BerufszielController extends Controller
{
    public static function asArray()
    {
        return berufsziel::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('berufsziel.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['bezeichnung' => 'required']);
        $berufsziel = new berufsziel;
        $berufsziel->Berufszielbezeichnung = request('bezeichnung');
        try {
            $berufsziel->save();
        } catch (\Exception $e) {
            return view('berufsziel.create')->withErrors($e->getMessage());
        }
        return redirect(route('berufsziel.show', $berufsziel));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\berufsziel  $berufsziel
     * @return \Illuminate\Http\Response
     */
    public function show(berufsziel $berufsziel)
    {
        return view('berufsziel.show', compact('berufsziel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\berufsziel  $berufsziel
     * @return \Illuminate\Http\Response
     */
    public function edit(berufsziel $berufsziel)
    {
        return view('berufsziel.edit', compact('berufsziel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\berufsziel  $berufsziel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, berufsziel $berufsziel)
    {
        $request->validate(['bezeichnung' => 'required']);

        $berufsziel->update(array('Berufszielbezeichnung' => request('bezeichnung')));
        try {
            $berufsziel->save();
        } catch (\Exception  $e) {
            return view('berufsziel.edit', $berufsziel)->withErrors($e->getMessage());
        }

        return redirect(route('berufsziel.show', $berufsziel));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\berufsziel  $berufsziel
     * @return \Illuminate\Http\Response
     */
    public function destroy(berufsziel $berufsziel)
    {
        try {
            $berufsziel->delete();
        } catch (\Exception  $e) {
            return view('berufsziel.show', compact('berufsziel'))->withErrors($e->getMessage());
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
        $berufsziel = berufsziel::paginate(25);
        return view('berufsziel.index', compact('berufsziel'));
    }
}
