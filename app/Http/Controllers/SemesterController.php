<?php

namespace App\Http\Controllers;

use App\semester;
use Illuminate\Http\Request;

class Semestercontroller extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');

    }

    public static function asArray()
    {
        return semester::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('semester.create');
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
        $semester = new Semester;
        $semester->Semesterbezeichnung = request('bezeichnung');
        try {
            $semester->save();
        } catch (\Exception $e) {
            return view('semester.create')->withErrors($e->getMessage());
        }
        redirect(route('semester.show', $semester));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\semester  $semester
     * @return \Illuminate\Http\Response
     */
    public function show(semester $semester)
    {
        return view('semester.show',compact('semester'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\semester  $semester
     * @return \Illuminate\Http\Response
     */
    public function edit(semester $semester)
    {
        return view('semester.edit', compact('semester'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\semester  $semester
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, semester $semester)
    {
        $request->validate(['bezeichnung' => 'required']);

        $semester->update(array('Semesterbezeichnung' => request('bezeichnung')));
        try {
            $semester->save();
        } catch (\Exception $e) {
            return view('semester.edit', $semester)->withErrors($e->getMessage());
        }
        redirect(route('semester.show', $semester));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\semester  $semester
     * @return \Illuminate\Http\Response
     */
    public function destroy(semester $semester)
    {
        try {
            $semester->delete();
        } catch (\Exception  $e) {
            return view('semester.show', compact('semester'))->withErrors($e->getMessage());
        }
        $this->index();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $semester = semester::paginate(25);
        return view('semester.index', compact('semester'));
    }
}
