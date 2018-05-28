@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <h3 class="text-center">Ansprechpartner</h3>

        <div class="btn-group">
            <div class="ml-1"><a href="{{route('welcome')}}" class="btn btn-info"> Übersicht</a></div>
            <div class="ml-1"><a href="{{route('ansprechpartner.create')}}" class="btn btn-info">
                    Ansprechpartner
                    hinzufügen</a></div>
            <div class="ml-1"><a href="{{route('ansprechpartnerliste.create')}}" class="btn btn-info">
                    Ansprechpartner
                    verbinden</a></div>
        </div>
    </div>
    <hr class="mb-4">
    <div class="table-responsive">
        <ul class="pager">{{$ansprechpartner->links() }}</ul>
        <table class="table table-hover table-striped">
            <tr>
                <th>ID</th>
                <th>Nachname</th>
                <th>Vorname</th>
                <th>Email</th>
                <th>Telefon</th>
            </tr>
            @foreach($ansprechpartner as $ansprechpartnerdatensatz)
                <tr>
                    <td>
                        <a href="{{route('ansprechpartner.show',$ansprechpartnerdatensatz)}}"> {{$ansprechpartnerdatensatz->Ansprechpartner_ID}}</a>
                    </td>
                    <td>
                        <a href="{{route('ansprechpartner.show',$ansprechpartnerdatensatz)}}"> {{$ansprechpartnerdatensatz->Nachname}}</a>
                    </td>
                    <td>
                        <a href="{{route('ansprechpartner.show',$ansprechpartnerdatensatz)}}"> {{$ansprechpartnerdatensatz->Vorname}}</a>
                    </td>
                    <td>
                        <a href="{{route('ansprechpartner.show',$ansprechpartnerdatensatz)}}"> {{$ansprechpartnerdatensatz->Email}}</a>
                    </td>
                    <td>
                        <a href="{{route('ansprechpartner.show',$ansprechpartnerdatensatz)}}"> {{$ansprechpartnerdatensatz->Telefon}}</a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection