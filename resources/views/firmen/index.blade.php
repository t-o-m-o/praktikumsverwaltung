@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <h3 class="text-center">Firmen</h3>

        <div class="btn-group">
            <div class="ml-1"><a href="{{route('welcome')}}" class="btn btn-info"> Übersicht</a></div>
            <div class="ml-1"><a href="{{route('firmen.create')}}" class="btn btn-info"> Firma hinzufügen</a>
            </div>
        </div>
    </div>

    <hr class="mb-4">
    <div class="table-responsive">
        <ul class="pager">{{$firmen->links() }}</ul>
        <table class="table table-hover table-striped">
            <tr>
                <th>ID</th>
                <th>Firmenname</th>
                <th>Bezeichnung</th>
                <th>Webseite</th>
                <th>Email</th>
                <th>Straße</th>
                <th>PLZ</th>
                <th>Ort</th>
            </tr>

            @foreach($firmen as $firma)
                <tr>
                    <td><a href="{{route('firmen.show',$firma)}}"> {{$firma->Firmen_ID}}</a></td>
                    <td><a href="{{route('firmen.show',$firma)}}"> {{$firma->Firmenname}}</a></td>
                    <td><a href="{{route('firmen.show',$firma)}}"> {{$firma->Firmenbezeichnung}}</a></td>
                    <td><a href="{{$firma->Firmenwebseite}}"> {{$firma->Firmenwebseite}}</a></td>
                    <td><a href="mailto:{{$firma->Email}}"> {{$firma->Email}}</a></td>
                    <td><a href="{{route('firmen.show',$firma)}}"> {{$firma->Strasse}}</a></td>
                    <td><a href="{{route('firmen.show',$firma)}}"> {{$firma->PLZ}}</a></td>
                    <td><a href="{{route('firmen.show',$firma)}}"> {{$firma->Ort}}</a></td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection