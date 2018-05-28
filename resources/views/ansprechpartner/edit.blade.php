@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <h3 class="text-center">Ansprechpartner bearbeiten</h3>

        <div class="btn-group">
            <div class="ml-1">
                <a href="{{route('welcome')}}" class="btn btn-info"> Übersicht</a>
            </div>
            <div class="ml-1">
                <a href="{{route('ansprechpartner.index')}}" class="btn btn-info">
                    Ansprechpartnerliste</a>
            </div>
            <div class="ml-1">
                <a href="{{route('ansprechpartner.create')}}" class="btn btn-info">
                    Ansprechpartner hinzufügen</a>
            </div>
            <div class="ml-1">
                <a href="{{route('ansprechpartnerliste.create')}}" class="btn btn-info">
                    Ansprechpartner verbinden</a>
            </div>
        </div>
    </div>
    <hr class="mb-4">
    <div class="form-group">
        {{Form::open(array('route' => array('ansprechpartner.update',$ansprechpartner),'method' => 'PUT' ) )}}

        <div class="mb-3">
            <label for="vorname">Vorname</label>

            <div class="input-group">
                <input type="text" class="form-control" name="vorname" id="vorname"
                       value="{{$ansprechpartner->Vorname}}">
            </div>
        </div>

        <div class="mb-3">
            <label for="status">Name</label>

            <div class="input-group">
                <input type="text" class="form-control" name="name" id="name"
                       value="{{$ansprechpartner->Nachname}}">
            </div>
        </div>

        <div class="mb-3">
            <label for="telefon">Telefon</label>

            <div class="input-group">
                <input type="text" class="form-control" name="telefon" id="telefon"
                       value="{{$ansprechpartner->Telefon}}">
            </div>
        </div>
        <div class="mb-3">
            <label for="email">E-Mail</label>

            <div class="input-group">
                <input type="text" class="form-control" name="email" id="email"
                       value="{{$ansprechpartner->Email}}">
            </div>
        </div>


        <hr class="mb-4">
        <button class="btn btn-primary btn-lg btn-block" type="submit" value="store">Ansprechpartner bearbeiten
        </button>
        {{ Form::close() }}
    </div>




@endsection
