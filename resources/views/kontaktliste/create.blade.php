@extends('layouts.app')
@section('content')

    <?php
    use App\praktika;
    $praktika = praktika::all();
    ?>

    <div class="container-fluid">
        <h3 class="text-center">Kontakt hinzufügen</h3>

        <div class="btn-group">
            <div class="ml-1"><a href="{{route('welcome')}}" class="btn btn-info"> Übersicht</a></div>
            <div class="ml-1"><a href="{{route('kontaktliste.index')}}" class="btn btn-info">
                    Kontakte</a></div>
            <div class="ml-1"><a href="{{Route('praktika.create')}}" class="btn btn-info"> Praktikum
                    hinzufügen</a>
            </div>
        </div>
    </div>
    <hr class="mb-4">
    <div class="form-group">
        {{Form::open(array('route' => array('kontaktliste.store') ) )}}

        <label for="praktikum">Praktikum</label>

        <div class="input-group">
            <select name="praktikum" class="form-control">
                <option value="">"Bitte Praktikum auswählen"</option>
                @foreach ($praktika as $praktikum)
                    <option
                            @if ($praktikum->Praktikum_ID == old('praktikum'))
                            selected
                            @endif
                            value="{{$praktikum->Praktikum_ID}}">
                        {{$praktikum->teilnehmer->Nachname}}&nbsp;&nbsp;&nbsp;
                        {{$praktikum->teilnehmer->Vorname}}&nbsp;&nbsp;&nbsp;
                        {{$praktikum->firmen->Firmenname}}
                    </option>
                @endforeach
            </select>
        </div>
        <hr class="mb-4">

        <div class="mb-3">
            <label for="datum">Datum</label>

            <div class="input-group">
                <input type="date" class="form-control" name="datum" id="datum" value="{{old('datum')}}">
            </div>
        </div>
        <hr class="mb-4">
        <div class="mb-3">
            <label for="beschreibung">Kontaktbeschreibung</label>

            <div class="input-group">
                <input type="text" class="form-control" name="beschreibung" id="beschreibung"
                       value="{{old('beschreibung')}}">
            </div>
        </div>

        <hr class="mb-4">

        <button class="btn btn-primary btn-lg btn-block" type="submit" value="store">Kontakt hinzufügen
        </button>

        {{ Form::close() }}
    </div>
@endsection
