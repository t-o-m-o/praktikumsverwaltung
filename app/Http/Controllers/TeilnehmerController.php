<?php

namespace App\Http\Controllers;

use App\teilnehmer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeilnehmerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public static function asArray()
    {
        if (in_array(Auth::user()->typ, ['admin', 'employe'])) {
            return teilnehmer::all();
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
            return view('teilnehmer.create');
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
        } else {
            return view('welcome');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\teilnehmer $teilnehmer
     * @return \Illuminate\Http\Response
     */
    public function show(teilnehmer $teilnehmer)
    {
        if (in_array(Auth::user()->typ, ['admin', 'employe'])) {
            return view('teilnehmer.show', compact('teilnehmer'));
        } else {
            return view('welcome');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\teilnehmer $teilnehmer
     * @return \Illuminate\Http\Response
     */
    public function edit(teilnehmer $teilnehmer)
    {
        if (in_array(Auth::user()->typ, ['admin', 'employe'])) {
            return view('teilnehmer.edit', compact('teilnehmer'));
        } else {
            return view('welcome');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\teilnehmer $teilnehmer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, teilnehmer $teilnehmer)
    {
        if (in_array(Auth::user()->typ, ['admin', 'employe'])) {
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
                'Nachname' => request('nachname')));
            try {
                $teilnehmer->save();
            } catch (\Exception $e) {
                return view('teilnehmer.edit', $teilnehmer)->withErrors($e->getMessage());
            }
            return view('teilnehmer.show', compact('teilnehmer'));
        } else {
            return view('welcome');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\teilnehmer $teilnehmer
     * @return \Illuminate\Http\Response
     */
    public function destroy(teilnehmer $teilnehmer)
    {
        if (in_array(Auth::user()->typ, ['admin', 'employe'])) {
            try {
                $teilnehmer->delete();
            } catch (\Exception  $e) {
                return view('teilnehmer.show', compact('teilnehmer'))->withErrors($e->getMessage());
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
            $teilnehmer = teilnehmer::paginate(25);
            return view('teilnehmer.index', compact('teilnehmer'));
        } else {
            return view('welcome');
        }
    }
}
