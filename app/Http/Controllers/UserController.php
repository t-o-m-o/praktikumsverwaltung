<?php

namespace App\Http\Controllers;

use App\user;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class Usercontroller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('welcome');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return view('welcome');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\user $user
     * @return \Illuminate\Http\Response
     */
    public function show(user $user)
    {
        return view('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\user $user
     * @return \Illuminate\Http\Response
     */
    public function edit(user $user)
    {
        if (Auth::user()->typ == "admin") {
            return view('user.edit', compact('user'));
        } else {
            return view('welcome');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\user $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, user $user)
    {
        if (Auth::user()->typ == "admin") {
            $request->validate([
                'name' => 'required',
                'email' => 'email',
                'typ' => ['required', Rule::in(
                    ['admin', 'user', 'employe']
                ),]
            ]);
            $user->update(array(
                'name' => request('name'),
                'email' => request('email'),
                'typ' => request('typ')
            ));

            try {
                $user->save();
            } catch (\Exception $e) {
                return view('user.edit', $user)->withErrors($e->getMessage());
            }

            return redirect(route('user.show', $user));
        } else {
            return view('welcome');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\user $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(user $user)
    {
        if (Auth::user()->typ == "admin") {
            try {
                $user->delete();
            } catch (\Exception $e) {
                return view('user.show', compact('user'))->withErrors($e->getMessage());
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
        if (Auth::user()->typ == "admin") {
            $users = user::paginate(25);
            return view('user.index', compact('users'));
        } else {
            return view('welcome');
        }
    }
}
