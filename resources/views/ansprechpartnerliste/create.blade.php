@extends('layouts.app')
@section('content')
    <?php
    use App\Ansprechpartner;
    use App\Firmen;
    use App\Berufsziel;

    $ansprechpartner = ansprechpartner::all();
    $firmen = firmen::all();
    $berufsziele = berufsziel::all();
    ?>

    <div class="container-fluid">
        <h3 class="text-center">Ansprechpartner verbinden</h3>

        <div class="btn-group">
            <div class="ml-1"><a href="{{route('welcome')}}" class="btn btn-info"> Übersicht</a></div>
            <div class="ml-1"><a href="{{route('ansprechpartnerliste.index')}}" class="btn btn-info">
                    Ansprechpartnerverbindungen</a></div>
            <div class="ml-1"><a href="{{route('ansprechpartner.create')}}" class="btn btn-info">
                    Ansprechpartner hinzufügen</a></div>
            <div class="ml-1"><a href="{{route('firmen.create')}}" class="btn btn-info"> Firma hinzufügen</a>
            </div>
            <div class="ml-1"><a href="{{route('berufsziel.create')}}" class="btn btn-info"> Berufsziel
                    hinzufügen</a>
            </div>
        </div>

    </div>
    <hr class="mb-4">
    <div class="form-group">
        {{Form::open(array('route' => array('ansprechpartnerliste.store') ) )}}

        <label for="ansprechpartner">Ansprechpartner</label>

        <div class="input-group">
            <select name="ansprechpartner" class="form-control">
                <option value="">"Bitte Ansprechpartner auswählen"</option>
                @foreach ($ansprechpartner as $ansprechpartnerdatensatz)
                    <option
                            @if ($ansprechpartnerdatensatz->Ansprechpartner_ID == old('ansprechpartner'))
                            selected
                            @endif
                            value="{{$ansprechpartnerdatensatz->Ansprechpartner_ID}}">
                        {{$ansprechpartnerdatensatz->Vorname}}&nbsp;&nbsp;&nbsp;
                        {{$ansprechpartnerdatensatz->Nachname}}
                    </option>
                @endforeach
            </select>
        </div>
        <hr class="mb-4">

        <label for="firma">Firma</label>

        <div class="input-group">
            <select name="firma" class="form-control">
                <option value="">"Bitte Firma auswählen"</option>
                @foreach ($firmen as $firma)
                    <option
                            @if ($firma->Firmen_ID == old('firma'))
                            selected
                            @endif
                            value="{{$firma->Firmen_ID}}">
                        {{$firma->Firmenname}}&nbsp;&nbsp;&nbsp;
                        {{$firma->Firmenbezeichnung}}
                    </option>
                @endforeach
            </select>
        </div>
        <hr class="mb-4">


        <label for="ziel">Berufsziel</label>

        <div class="input-group">
            <select name="ziel" class="form-control">
                <option value="">"Bitte Berufsziel auswählen"</option>
                @foreach ($berufsziele as $berusziel)
                    <option
                            @if ($berusziel->Berufsziel_ID == old('ziel'))
                            selected
                            @endif
                            value="{{$berusziel->Berufsziel_ID}}">
                        {{$berusziel->Berufszielbezeichnung}}
                    </option>
                @endforeach
            </select>
        </div>

        <hr class="mb-4">
        <button class="btn btn-primary btn-lg btn-block" type="submit" value="store">Ansprechpartner verbinden
        </button>

        {{ Form::close() }}
    </div>
@endsection
