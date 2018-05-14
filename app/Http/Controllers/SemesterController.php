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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\semester  $semester
     * @return \Illuminate\Http\Response
     */
    public function show(semester $semester)
    {
        $semester = $semester->praktika;
        return view('semester.semester',compact('semester'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\semester  $semester
     * @return \Illuminate\Http\Response
     */
    public function edit(semester $semester)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\semester  $semester
     * @return \Illuminate\Http\Response
     */
    public function destroy(semester $semester)
    {
        //
    }

    public static function asArray()
    {
        $semesterl = semester::all();
        return $semesterl;
    }
}
