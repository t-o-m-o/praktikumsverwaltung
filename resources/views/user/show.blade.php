@extends('layouts.app')
@section('content')
@if (isset(Auth::user()->typ) && Auth::user()->typ=="admin")
    <div class="container-fluid">
        <h3 class="text-center">{{$user->name}}</h3>
        <div class="text-center">{{$user->email}}</div>
        <div class="text-center">{{$user->typ}}</div>

        <div class="btn-group">
            <div class="ml-1">
                <a href="{{route('welcome')}}" class="btn btn-info"> Übersicht</a>
            </div>
            <div class="ml-1">
                <a href="{{route('user.index')}}" class="btn btn-info"> Benutzerliste</a>
            </div>
            <div class="ml-1">
                <a href="{{route('user.edit',$user)}}" class="btn btn-warning"> Benutzer
                    bearbeiten</a>
            </div>
            <div class="ml-1">
                {{ Form::open(array('route' => array('user.destroy',$user),'method' => 'DELETE' ) )}}
                {{ Form::submit('Benutzer löschen', array('class' => 'btn btn-danger')) }}
                {{ Form::close() }}
            </div>
        </div>
    </div>
    <hr class="mb-4">

@endif
@endsection
