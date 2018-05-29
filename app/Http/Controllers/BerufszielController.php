<?php

namespace App\Http\Controllers;

use App\berufsziel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BerufszielController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public static function asArray()
    {
        if (in_array(Auth::user()->typ, ['admin', 'employe'])) {
            return berufsziel::all();
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
            return view('berufsziel.create');
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
            $request->validate(['bezeichnung' => 'required']);
            $berufsziel = new berufsziel;
            $berufsziel->Berufszielbezeichnung = request('bezeichnung');
            try {
                $berufsziel->save();
            } catch (\Exception $e) {
                return view('berufsziel.create')->withErrors($e->getMessage());
            }
            return redirect(route('berufsziel.show', $berufsziel));
        } else {
            return view('welcome');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\berufsziel $berufsziel
     * @return \Illuminate\Http\Response
     */
    public function show(berufsziel $berufsziel)
    {
        if (in_array(Auth::user()->typ, ['admin', 'employe'])) {
            return view('berufsziel.show', compact('berufsziel'));
        } else {
            return view('welcome');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\berufsziel $berufsziel
     * @return \Illuminate\Http\Response
     */
    public function edit(berufsziel $berufsziel)
    {
        if (in_array(Auth::user()->typ, ['admin', 'employe'])) {
            return view('berufsziel.edit', compact('berufsziel'));
        } else {
            return view('welcome');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\berufsziel $berufsziel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, berufsziel $berufsziel)
    {
        if (in_array(Auth::user()->typ, ['admin', 'employe'])) {
            $request->validate(['bezeichnung' => 'required']);

            $berufsziel->update(array('Berufszielbezeichnung' => request('bezeichnung')));
            try {
                $berufsziel->save();
            } catch (\Exception  $e) {
                return view('berufsziel.edit', $berufsziel)->withErrors($e->getMessage());
            }

            return redirect(route('berufsziel.show', $berufsziel));
        } else {
            return view('welcome');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\berufsziel $berufsziel
     * @return \Illuminate\Http\Response
     */
    public function destroy(berufsziel $berufsziel)
    {
        if (in_array(Auth::user()->typ, ['admin', 'employe'])) {
            try {
                $berufsziel->delete();
            } catch (\Exception  $e) {
                return view('berufsziel.show', compact('berufsziel'))->withErrors($e->getMessage());
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
            $berufsziel = berufsziel::paginate(25);
            return view('berufsziel.index', compact('berufsziel'));
        } else {
            return view('welcome');
        }
    }
}
