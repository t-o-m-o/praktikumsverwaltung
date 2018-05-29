<?php

namespace App\Http\Controllers;

use App\praktikazeitraeume;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Praktikazeitraeumecontroller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public static function asArray()
    {
        if (in_array(Auth::user()->typ, ['admin', 'employe'])) {
            return praktikazeitraeume::all();
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
            return view('praktikazeitraeume.create');
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
            $request->validate(['start' => 'date', 'ende' => 'date']);
            $praktikazeitraeume = new praktikazeitraeume;
            $praktikazeitraeume->Start = request('start');
            $praktikazeitraeume->Ende = request('ende');
            try {
                $praktikazeitraeume->save();
            } catch (\Exception $e) {
                return view('praktikazeitraeume.create')->withErrors($e->getMessage());
            }
            return redirect(route('praktikazeitraeume.show', $praktikazeitraeume));
        } else {
            return view('welcome');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\praktikazeitraeume $praktikazeitraeume
     * @return \Illuminate\Http\Response
     */
    public function show(praktikazeitraeume $praktikazeitraeume)
    {
        if (in_array(Auth::user()->typ, ['admin', 'employe'])) {
            return view('praktikazeitraeume.show', compact('praktikazeitraeume'));
        } else {
            return view('welcome');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\praktikazeitraeume $praktikazeitraeume
     * @return \Illuminate\Http\Response
     */
    public function edit(praktikazeitraeume $praktikazeitraeume)
    {
        if (in_array(Auth::user()->typ, ['admin', 'employe'])) {
            return view('praktikazeitraeume.edit', compact('praktikazeitraeume'));
        } else {
            return view('welcome');
        }
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
        if (in_array(Auth::user()->typ, ['admin', 'employe'])) {
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
        } else {
            return view('welcome');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\praktikazeitraeume $praktikazeitraeume
     * @return \Illuminate\Http\Response
     */
    public function destroy(praktikazeitraeume $praktikazeitraeume)
    {
        if (in_array(Auth::user()->typ, ['admin', 'employe'])) {
            try {
                $praktikazeitraeume->delete();
            } catch (\Exception  $e) {
                return view('praktikazeitraeume.show', compact('praktikazeitraeume'))->withErrors($e->getMessage());
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
            $praktikazeitraeume = praktikazeitraeume::paginate(25);
            return view('praktikazeitraeume.index', compact('praktikazeitraeume'));
        } else {
            return view('welcome');
        }
    }
}
