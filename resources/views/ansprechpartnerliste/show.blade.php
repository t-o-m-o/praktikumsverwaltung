@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <h3 class="text-center">Ansprechpartnerverbindung</h3>
        <h3 class="text-center">{{$ansprechpartnerliste->id}}</h3>
        <div class="text-center">{{$ansprechpartnerliste->ansprechpartner->Vorname}},
            {{ $ansprechpartnerliste->ansprechpartner->Nachname}}</div>
        <div class="text-center">{{$ansprechpartnerliste->firmen->Firmenname}}</div>
        <div class="text-center">{{$ansprechpartnerliste->berufsziel->Berufszielbezeichnung}}</div>

        <div class="btn-group">
            <div class="ml-1">
                <a href="{{route('welcome')}}" class="btn btn-info"> Übersicht</a>
            </div>
            <div class="ml-1">
                <a href="{{route('ansprechpartnerliste.index')}}" class="btn btn-info"> Ansprechpartnerliste</a>
            </div>
            <div class="ml-1">
                <a href="{{route('ansprechpartnerliste.edit',$ansprechpartnerliste)}}" class="btn btn-warning">
                    Ansprechpartnerverbindung bearbeiten</a>
            </div>
            <div class="ml-1">
                {{ Form::open(array('route' => array('ansprechpartnerliste.destroy',$ansprechpartnerliste),'method' => 'DELETE' ) )}}
                {{ Form::submit('Ansprechpartnerverbindung löschen', array('class' => 'btn btn-danger')) }}
                {{ Form::close() }}
            </div>
        </div>
    </div>

    <hr class="mb-4">

@endsection