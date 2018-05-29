@extends('layouts.app')
@section('content')
    @if (isset(Auth::user()->typ) && Auth::user()->typ=="admin")
        <div class="container-fluid">
            <h3 class="text-center">Benutzer bearbeiten</h3>

            <div class="btn-group">
                <div class="ml-1">
                    <a href="{{route('welcome')}}" class="btn btn-info"> Übersicht</a>
                </div>
                <div class="ml-1">
                    <a href="{{route('user.index')}}" class="btn btn-info">
                        Benutzerliste</a>
                </div>
                <div class="ml-1">
                    {{ Form::open(array('route' => array('user.destroy',$user),'method' => 'DELETE' ) )}}
                    {{ Form::submit('Benutzer löschen', array('class' => 'btn btn-danger')) }}
                    {{ Form::close() }}
                </div>
            </div>
        </div>
        <hr class="mb-4">
        <div class="form-group">
            {{Form::open(array('route' => array('user.update',$user),'method' => 'PUT' ) )}}

            <div class="mb-3">
                <label for="name">Name</label>

                <div class="input-group">
                    <input type="text" class="form-control" name="name" id="name"
                           value="{{$user->name}}">
                </div>
            </div>
            <hr class="mb-4">

            <div class="mb-3">
                <label for="email">Email</label>

                <div class="input-group">
                    <input type="text" class="form-control" name="email" id="email"
                           value="{{$user->email}}">
                </div>
            </div>
            <hr class="mb-4">
            <div class="mb-3">
                <label for="typ">Typ</label>

                <div class="input-group">
                    <select class="form-control" name="typ" id="typ">
                        <option
                                @if ($user->typ == "user")
                                selected
                                @endif
                                value="user">Benutzer
                        </option>
                        <option
                                @if ($user->typ == "admin")
                                selected
                                @endif
                                value="admin">Administrator
                        </option>
                        <option
                                @if ($user->typ == "employe")
                                selected
                                @endif
                                value="employe">Mitarbeiter
                        </option>
                    </select>
                </div>
            </div>

            <hr class="mb-4">

            <button class="btn btn-primary btn-lg btn-block" type="submit" value="store">Kontakt bearbeiten</button>
            {{ Form::close() }}
        </div>
    @endif

@endsection
