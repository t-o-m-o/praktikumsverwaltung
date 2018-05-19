<?php

namespace App\Http\Controllers;

use App\praktikazeitraeume;
use Illuminate\Http\Request;

class Praktikazeitraeumecontroller extends Controller
{
    public static function asArray()
    {
        return praktikazeitraeume::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('praktikazeitraeume.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['start' => 'required'],
            ['ende' => 'required']
        );
        $praktikazeitraeume = new praktikazeitraeume;
        $praktikazeitraeume->Start = request('start');
        $praktikazeitraeume->Ende = request('ende');
        try {
            $praktikazeitraeume->save();
        } catch (\Exception $e) {
            return view('praktikazeitraeume.create')->withErrors($e->getMessage());
        }
        return redirect(route('praktikazeitraeume.show', $praktikazeitraeume));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\praktikazeitraeume $praktikazeitraeume
     * @return \Illuminate\Http\Response
     */
    public function show(praktikazeitraeume $praktikazeitraeume)
    {
        return view('praktikazeitraeume.show', compact('praktikazeitraeume'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\praktikazeitraeume $praktikazeitraeume
     * @return \Illuminate\Http\Response
     */
    public function edit(praktikazeitraeume $praktikazeitraeume)
    {
        return view('praktikazeitraeume.edit', compact('praktikazeitraeume'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\praktikazeitraeume $praktikazeitraeume
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, praktikazeitraeume $praktikazeitraeume)
    {
        $request->validate(['start' => 'required'],
            ['ende' => 'required']
        );

        $praktikazeitraeume->update(
            array('Start' => request('start'),
                'Ende' => request('ende')
            ));
        try {
            $praktikazeitraeume->save();
        } catch (\Exception $e) {
            return view('praktikazeitraeume.edit', $praktikazeitraeume)->withErrors($e->getMessage());
        }
        return redirect(route('praktikazeitraeume.show', $praktikazeitraeume));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\praktikazeitraeume $praktikazeitraeume
     * @return \Illuminate\Http\Response
     */
    public function destroy(praktikazeitraeume $praktikazeitraeume)
    {
        try {
            $praktikazeitraeume->delete();
        } catch (\Exception  $e) {
            return view('praktikazeitraeume.show', compact('praktikazeitraeume'))->withErrors($e->getMessage());
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
        $praktikazeitraeume = praktikazeitraeume::paginate(25);
        return view('praktikazeitraeume.index', compact('praktikazeitraeume'));
    }
}
