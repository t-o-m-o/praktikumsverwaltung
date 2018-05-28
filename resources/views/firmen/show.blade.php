@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <h3 class="text-center">{{ $firmen->Firmenname}}</h3>

        <div class="text-center">{{$firmen->Firmenbezeichnung}}</div>
        <div class="text-center">{{$firmen->Firmenwebseite}}</div>
        <div class="text-center">{{$firmen->Strasse}}</div>
        <div class="text-center">{{$firmen->PLZ}}</div>
        <div class="text-center">{{$firmen->Ort}}</div>
        <div class="text-center">{{$firmen->Telefon}}</div>
        <div class="text-center">{{$firmen->Email}}</div>

        <div class="btn-group">
            <div class=".col-md-4 ml-1">
                <a href="{{route('welcome')}}" class="btn btn-info"> Übersicht</a>
            </div>
            <div class="ml-1">
                <a href="{{route('firmen.index')}}" class="btn btn-info">
                    Firmenliste</a>
            </div>
            <div class=".col-sm-4 ml-1">
                <a href="{{route('firmen.edit',$firmen)}}" class="btn btn-warning"> Firma bearbeiten</a>
            </div>
            <div class=".col-sm-4 ml-1">
                {{ Form::open(array('route' => array('firmen.destroy',$firmen),'method' => 'DELETE' ) )}}
                {{ Form::submit('Firma löschen', array('class' => 'btn btn-danger')) }}
                {{ Form::close() }}
            </div>
        </div>
    </div>
    <hr class="mb-4">
    <?php $ansprechpartnerliste = $firmen->ansprechpartnerliste ?>
    <h3>Ansprechpartner</h3>

    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <tr>
                <th>Berufsziel</th>
                <th>Name</th>
                <th>Vorname</th>
                <th>Email</th>
                <th>Telefon</th>
            </tr>
            @foreach($ansprechpartnerliste as $ansprechpartner)
                <tr>
                    <td>
                        <a href="{{route('berufsziel.show',$ansprechpartner->berufsziel)}}">{{ $ansprechpartner->berufsziel->Berufszielbezeichnung}}</a>
                    </td>
                    <td>
                        <a href="{{route('ansprechpartner.show',$ansprechpartner)}}">{{$ansprechpartner->ansprechpartner->Nachname}}</a>
                    </td>
                    <td>
                        <a href="{{route('ansprechpartner.show',$ansprechpartner)}}">{{$ansprechpartner->ansprechpartner->Vorname}}</a>
                    </td>
                    <td>
                        <a href="{{route('ansprechpartner.show',$ansprechpartner)}}">{{$ansprechpartner->ansprechpartner->Email}}</a>
                    </td>
                    <td>
                        <a href="{{route('ansprechpartner.show',$ansprechpartner)}}">{{$ansprechpartner->ansprechpartner->Telefon}}</a>
                    </td>
                </tr>
            @endforeach

        </table>
    </div>

    <hr class="mb-4">
    <?php $praktikantenliste = $firmen->praktika ?>
    <h3>Praktikanten</h3>
    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <tr>
                <th>Semester</th>
                <th>Berufsziel</th>
                <th>Teilnehmer</th>
                <th>Status</th>
                <th>Start</th>
                <th>Ende</th>
                <th>Ansprechpartner</th>
            </tr>
            @foreach($praktikantenliste as $praktikum)
                <tr>
                    <td>
                        <a href="{{route('semester.show',$praktikum->teilnehmer->semester)}}">{{ $praktikum->teilnehmer->semester['Semesterbezeichnung']}}</a>
                    </td>
                    <td>
                        <a href="{{route('berufsziel.show',$praktikum->teilnehmer->berufsziel)}}">{{ $praktikum->teilnehmer->berufsziel['Berufszielbezeichnung']}}</a>
                    </td>
                    <td>
                        <a href="{{route('teilnehmer.show',$praktikum->teilnehmer)}}"> {{$praktikum->teilnehmer->Nachname}}</a>
                    <td><a href="{{route('praktika.show',$praktikum)}}">{{ $praktikum['Status'] }}</a></td>
                    <td>{{ $praktikum->praktikazeitraeume['Start'] }}</td>
                    <td>{{ $praktikum->praktikazeitraeume['Ende'] }}</td>
                    <?php $ansprechpartner = $praktikum->firmen->ansprechpartner->first()?>
                    <td>
                        <a href="{{route('ansprechpartner.show',$ansprechpartner)}}">{{ $ansprechpartner->Nachname}}</a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
