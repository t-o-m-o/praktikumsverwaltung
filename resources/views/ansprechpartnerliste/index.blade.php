@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <h3 class="text-center">Ansprechpartnerverbindungen</h3>

        <div class="btn-group">
            <div class="ml-1"><a href="{{route('welcome')}}" class="btn btn-info"> Übersicht</a></div>
            <div class="ml-1"><a href="{{route('ansprechpartnerliste.create')}}" class="btn btn-info">
                    Ansprechpartner
                    verbinden</a></div>
            <div class="ml-1"><a href="{{route('ansprechpartner.create')}}" class="btn btn-info">
                    Ansprechpartner
                    hinzufügen</a></div>
        </div>
    </div>
    <hr class="mb-4">
    <div class="table-responsive">
        <ul class="pager">{{$ansprechpartnerliste->links() }}</ul>
        <table class="table table-hover table-striped">
            <tr>
                <th>Verbindung</th>
                <th>Ansprechpartner</th>
                <th>Firma</th>
                <th>Berufsziel</th>
            </tr>
            @foreach($ansprechpartnerliste as $ansprechpartnerdatensatz)
                <tr>
                    <td>
                        <a href="{{route('ansprechpartnerliste.show',$ansprechpartnerdatensatz->id)}}">
                            {{$ansprechpartnerdatensatz->id}}</a>
                    </td>
                    <td>
                        <a href="{{route('ansprechpartner.show',$ansprechpartnerdatensatz)}}">
                            {{$ansprechpartnerdatensatz->ansprechpartner->Nachname}}</a>
                    </td>
                    <td>
                        <a href="{{route('firmen.show',$ansprechpartnerdatensatz->Firmen_ID)}}">
                            {{$ansprechpartnerdatensatz->firmen->Firmenname}}</a>
                    </td>
                    <td>
                        <a href="{{route('firmen.show',$ansprechpartnerdatensatz->Berufsziel_ID)}}">
                            {{$ansprechpartnerdatensatz->berufsziel->Berufszielbezeichnung}}</a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection