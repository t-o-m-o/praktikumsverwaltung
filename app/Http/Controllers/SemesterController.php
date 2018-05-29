<?php

namespace App\Http\Controllers;

use App\semester;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Semestercontroller extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');

    }

    public static function asArray()
    {
        if (in_array(Auth::user()->typ, ['admin', 'employe'])) {
            return semester::all();
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
            return view('semester.create');
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
            $semester = new Semester;
            $semester->Semesterbezeichnung = request('bezeichnung');
            try {
                $semester->save();
            } catch (\Exception $e) {
                return view('semester.create')->withErrors($e->getMessage());
            }
            redirect(route('semester.show', $semester));
        } else {
            return view('welcome');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\semester $semester
     * @return \Illuminate\Http\Response
     */
    public function show(semester $semester)
    {
        if (in_array(Auth::user()->typ, ['admin', 'employe'])) {
            return view('semester.show', compact('semester'));
        } else {
            return view('welcome');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\semester $semester
     * @return \Illuminate\Http\Response
     */
    public
    function edit(semester $semester)
    {
        if (in_array(Auth::user()->typ, ['admin', 'employe'])) {
            return view('semester.edit', compact('semester'));
        } else {
            return view('welcome');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\semester $semester
     * @return \Illuminate\Http\Response
     */
    public
    function update(Request $request, semester $semester)
    {
        if (in_array(Auth::user()->typ, ['admin', 'employe'])) {
            $request->validate(['bezeichnung' => 'required']);

            $semester->update(array('Semesterbezeichnung' => request('bezeichnung')));
            try {
                $semester->save();
            } catch (\Exception $e) {
                return view('semester.edit', $semester)->withErrors($e->getMessage());
            }
            redirect(route('semester.show', $semester));
        } else {
            return view('welcome');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\semester $semester
     * @return \Illuminate\Http\Response
     */
    public
    function destroy(semester $semester)
    {
        if (in_array(Auth::user()->typ, ['admin', 'employe'])) {
            try {
                $semester->delete();
            } catch (\Exception  $e) {
                return view('semester.show', compact('semester'))->withErrors($e->getMessage());
            }
            $this->index();
        } else {
            return view('welcome');
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public
    function index()
    {
        if (in_array(Auth::user()->typ, ['admin', 'employe'])) {
            $semester = semester::paginate(25);
            return view('semester.index', compact('semester'));
        } else {
            return view('welcome');
        }
    }
}
