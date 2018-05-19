@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="form-group">
            {{Form::open(array('route' => array('firmen.store') ) )}}
            <div class="mb-3">
                <label for="status">Name</label>
                <div class="input-group">
                    <input type="text" class="form-control" name="name" id="name" value="{{old('name')}}">
                </div>
            </div>

            <div class="mb-3">
                <label for="bezeichnung">Bezeichnung</label>
                <div class="input-group">
                    <input type="text" class="form-control" name="bezeichnung" id="bezeichnung"
                           value="{{old('bezeichnung')}}">
                </div>
            </div>

            <div class="mb-3">
                <label for="strasse">Strasse</label>

                <div class="input-group">
                    <input type="text" class="form-control" name="strasse" id="strasse" value="{{old('strasse')}}">
                </div>
            </div>
            <div class="mb-3">
                <label for="ort">Ort</label>

                <div class="input-group">
                    <input type="text" class="form-control" name="ort" id="ort" value="{{old('ort')}}">
                </div>
            </div>

            <div class="mb-3">
                <label for="plz">PLZ</label>
                <div class="input-group">
                    <input type="text" class="form-control" name="plz" id="plz" value="{{old('plz')}}">
                </div>
            </div>

            <div class="mb-3">
                <label for="telefon">Telefon</label>
                <div class="input-group">
                    <input type="text" class="form-control" name="telefon" id="telefon" value="{{old('telefon')}}">
                </div>
            </div>
            <div class="mb-3">
                <label for="email">E-Mail</label>

                <div class="input-group">
                    <input type="text" class="form-control" name="email" id="email" value="{{old('email')}}">
                </div>
            </div>

            <div class="mb-3">
                <label for="webseite">Webseite</label>

                <div class="input-group">
                    <input type="text" class="form-control" name="webseite" id="webseite" value="{{old('webseite')}}">
                </div>
            </div>

            <hr class="mb-4">

            <button class="btn btn-primary btn-lg btn-block" type="submit" value="store">Firma hinzufügen</button>

            {{ Form::close() }}
        </div>
    </div>
@endsection
