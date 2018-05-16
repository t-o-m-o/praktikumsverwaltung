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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $semester = semester::paginate(25);
        return view('semester.semesterliste', compact('semester'));
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
        $semester->save();
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
        $semester->save();
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
        $semester->delete();
        $this->index();
    }

    public static function asArray()
    {
        $semesterl = semester::all();
        return $semesterl;
    }
}
