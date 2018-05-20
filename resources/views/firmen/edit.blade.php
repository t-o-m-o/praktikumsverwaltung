@extends('layouts.app')
@section('content')

    <div class="container-fluid">
        <h3 class="text-center">Firma bearbeiten</h3>

        <div class="btn-group">
            <div class="ml-1">
                <a href="{{route('welcome')}}" class="btn btn-info"> Übersicht</a>
            </div>
            <div class="ml-1">
                <a href="{{route('firmen.index')}}" class="btn btn-info">
                    Firmenliste</a>
            </div>
            <div class="ml-1">
                <a href="{{route('firmen.create')}}" class="btn btn-info">
                    Firma hinzufügen</a>
            </div>
        </div>
    </div>
    <hr class="mb-4">
    <div class="form-group">
        {{Form::open(array('route' => array('firmen.update',$firmen),'method' => 'PUT' ) )}}
        <div class="mb-3">
            <label for="status">Name</label>

            <div class="input-group">
                <input type="text" class="form-control" name="name" id="name" value="{{$firmen->Firmenname}}">
            </div>
        </div>

        <div class="mb-3">
            <label for="bezeichnung">Bezeichnung</label>

            <div class="input-group">
                <input type="text" class="form-control" name="bezeichnung" id="bezeichnung"
                       value="{{$firmen->Firmenbezeichnung}}">
        </div>
        </div>

        <div class="mb-3">
            <label for="strasse">Strasse</label>

            <div class="input-group">
                <input type="text" class="form-control" name="strasse" id="strasse" value="{{$firmen->Strasse}}">
            </div>
        </div>
        <div class="mb-3">
            <label for="ort">Ort</label>

            <div class="input-group">
                <input type="text" class="form-control" name="ort" id="ort" value="{{$firmen->Ort}}">
            </div>
        </div>

        <div class="mb-3">
            <label for="plz">PLZ</label>

            <div class="input-group">
                <input type="text" class="form-control" name="plz" id="plz" value="{{$firmen->PLZ}}">
            </div>
        </div>

        <div class="mb-3">
            <label for="telefon">Telefon</label>

            <div class="input-group">
                <input type="text" class="form-control" name="telefon" id="telefon" value="{{$firmen->Telefon}}">
            </div>
        </div>
        <div class="mb-3">
            <label for="email">E-Mail</label>

            <div class="input-group">
                <input type="text" class="form-control" name="email" id="email" value="{{$firmen->Email}}">
            </div>
        </div>

        <div class="mb-3">
            <label for="webseite">Webseite</label>

            <div class="input-group">
                <input type="text" class="form-control" name="webseite" id="webseite"
                       value="{{$firmen->Firmenwebseite}}">
            </div>
        </div>

        <hr class="mb-4">
        <button class="btn btn-primary btn-lg btn-block" type="submit" value="store">Firma bearbeiten</button>
        {{ Form::close() }}
    </div>

@endsection
