@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <h3 class="text-center">Ansprechpartner</h3>

        <h3 class="text-center">{{$ansprechpartner->Vorname}}, {{ $ansprechpartner->Nachname}}</h3>

        <div class="text-center">{{$ansprechpartner->Email}}</div>
        <div class="text-center">{{$ansprechpartner->Telefon}}</div>

        <div class="btn-group">
            <div class=".col-md-4 ml-1">
                <a href="{{route('welcome')}}" class="btn btn-info"> Übersicht</a>
            </div>
            <div class=".col-md-4 ml-1">
                <a href="{{route('ansprechpartner.index')}}" class="btn btn-info"> Ansprechpartnerliste</a>
            </div>
            <div class=".col-md-4 ml-1">
                <a href="{{route('ansprechpartner.edit',$ansprechpartner)}}" class="btn btn-warning"> Ansprechpartner
                    bearbeiten</a>
            </div>
            <div class=".col-md-4 ml-1">
                {{ Form::open(array('route' => array('ansprechpartner.destroy',$ansprechpartner),'method' => 'DELETE' ) )}}
                {{ Form::submit('Ansprechpartner löschen', array('class' => 'btn btn-danger')) }}
                {{ Form::close() }}
            </div>
            <div class=".col-md-4 ml-1"><a href="{{route('ansprechpartnerliste.create')}}" class="btn btn-info">
                    Ansprechpartner verbinden</a>
            </div>
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