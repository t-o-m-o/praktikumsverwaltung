@extends('layouts.app')
@section('content')
    <div class="container">
        <h2>{{$ansprechpartner->Vorname}}, {{ $ansprechpartner->Nachname}}</h2>

        <div>{{$ansprechpartner->Email}}</div>
        <div>{{$ansprechpartner->Telefon}}</div>
    </div>
    <div class="row">
        <div class=".col-sm-4">
            <a href="{{url()->previous()}}" class="btn btn-info"> zurück</a>
        </div>
        <div class=".col-sm-4">
            <a href="{{route('ansprechpartner.edit',$ansprechpartner)}}" class="btn btn-warning"> Ansprechpartner
                bearbeiten</a>
        </div>
        <div class=".col-sm-4">
            {{ Form::open(array('route' => array('ansprechpartner.destroy',$ansprechpartner),'method' => 'DELETE' ) )}}
            {{ Form::submit('Ansprechpartner löschen', array('class' => 'btn btn-danger')) }}
            {{ Form::close() }}
        </div>
    </div>

    <hr class="mb-4">
    <?php $firmen = $ansprechpartner->firmen ?>
    <h3>Firmen</h3>
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
                    <td><a href="{{route('firmen.show',$firma)}}"> {{$firma->Firmenname}}</a></td>
                    <td><a href="{{route('firmen.show',$firma)}}"> {{$firma->Firmenbezeichnung}}</a></td>
                    <td><a href="{{route('firmen.show',$firma)}}"> {{$firma->Firmenwebseite}}</a></td>
                    <td><a href="{{route('firmen.show',$firma)}}"> {{$firma->Email}}</a></td>
                    <td><a href="{{route('firmen.show',$firma)}}"> {{$firma->Strasse}}</a></td>
                    <td><a href="{{route('firmen.show',$firma)}}"> {{$firma->Ort}}</a></td>
                    <td><a href="{{route('firmen.show',$firma)}}"> {{$firma->PLZ}}</a></td>
                </tr>
            @endforeach

        </table>
    </div>

    <hr class="mb-4">
    <?php $berufsziele = $ansprechpartner->berufsziele ?>
    <h3>Berufsziele</h3>

    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <tr>
                <th>Berufszielbezeichnung</th>
            </tr>
            @foreach($berufsziele as $berufsziel)
                <tr>
                    <td>
                        <a href="{{route('berufsziel.show',$berufsziel)}}">{{ $berufsziel['Berufszielbezeichnung']}}</a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection