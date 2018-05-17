@extends('layouts.app')
@section('content')
    <div class="container">

        <div class="row">
            <div class=".col-sm-4"><a href="{{url()->previous()}}" class="btn btn-info"> zurück</a></div>
            <div class=".col-sm-4"><a href="{{route('firmen.create')}}" class="btn btn-info"> Firma hinzufügen</a>
            </div>
        </div>
        <ul class="pager">{{$firmen->links() }}</ul>
        <hr class="mb-4">
        <div class="table-responsive">
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
                        <td>{{ $firma->Firmenname}} </td>
                        <td>{{ $firma->Firmenbezeichnung}} </td>
                        <td>{{ $firma->Firmenwebseite}} </td>
                        <td>{{ $firma->Email}} </td>
                        <td>{{ $firma->Strasse}} </td>
                        <td>{{ $firma->Ort}} </td>
                        <td>{{ $firma->PLZ}} </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
