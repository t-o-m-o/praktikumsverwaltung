@extends('layouts.app')
@section('content')

    <div class="container-fluid">
        <h3 class="text-center">Kontakte</h3>

        <div class="btn-group">
            <div class="ml-1"><a href="{{route('welcome')}}" class="btn btn-info"> Übersicht</a></div>
            <div class="ml-1"><a href="{{route('kontaktliste.create')}}" class="btn btn-info"> Kontakt
                    hinzufügen</a>
            </div>
        </div>
    </div>

    <hr class="mb-4">
    <div class="table-responsive">
        <ul class="pager">{{$kontaktliste->links() }}</ul>
        <table class="table table-hover table-striped">
            <tr>
                <th>ID</th>
                <th>Praktikum</th>
                <th>Firma</th>
                <th>Teilnehmer</th>
                <th>Datum</th>
                <th>Beschreibung</th>
            </tr>
            @foreach($kontaktliste as $kontakt)
                <tr>
                    <td>
                        <a href="{{route('kontaktliste.show',$kontakt)}}"> {{$kontakt->id}}</a>
                    </td>
                    <td>
                        <a href="{{route('praktika.show',$kontakt->praktika)}}"> {{$kontakt->praktika->Praktikum_ID}}</a>
                    </td>
                    <td>
                        <a href="{{route('firmen.show',$kontakt->praktika->firmen)}}"> {{$kontakt->praktika->firmen->Firmenname}}</a>
                    </td>
                    <td>
                        <a href="{{route('teilnehmer.show',$kontakt->praktika->teilnehmer)}}"> {{$kontakt->praktika->teilnehmer->Nachname}}</a>
                    </td>
                    <td>
                        <a href="{{route('kontaktliste.show',$kontakt)}}"> {{$kontakt->Datum}}</a>
                    </td>
                    <td>
                        <a href="{{route('kontaktliste.show',$kontakt)}}"> {{$kontakt->Kontaktbeschreibung}}</a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection