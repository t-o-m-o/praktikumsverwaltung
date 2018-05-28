@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <h3 class="text-center">{{$teilnehmer->Vorname}}, {{$teilnehmer->Nachname}}</h3>

        <div class="text-center">{{$teilnehmer->berufsziel->Berufszielbezeichnung}}</div>
        <div class="text-center">{{$teilnehmer->semester->Semesterbezeichnung}}</div>
        <div class="btn-group">
            <div class="ml-1">
                <a href="{{route('welcome')}}" class="btn btn-info"> Übersicht</a>
            </div>
            <div class="ml-1">
                <a href="{{route('teilnehmer.index')}}" class="btn btn-info"> Teilnehmerliste</a>
            </div>
            <div class="ml-1">
                <a href="{{route('teilnehmer.edit',$teilnehmer)}}" class="btn btn-warning"> Teilnehmer bearbeiten</a>
            </div>
            <div class="ml-1">
                {{Form::open(array('route' => array('teilnehmer.destroy',$teilnehmer),'method' => 'DELETE' ) )}}
                {{ Form::submit('Teilnehmer löschen', array('class' => 'btn btn-danger')) }}
                {{ Form::close() }}
            </div>
        </div>
    </div>

    <hr class="mb-4">
    <div class="table-responsive">
        <h3>Praktika:</h3>
        <table class="table table-hover table-striped">
            <tr>
                <th>ID</th>
                <th>Firmenname</th>
                <th>Status</th>
                <th>Start</th>
                <th>Ende</th>
                <th>Ansprechpartner</th>
            </tr>
            <?php $praktika = $teilnehmer->praktika; ?>

            @foreach($praktika as $praktikum)
            <tr>
                <td><a href="{{route('praktika.show',$praktikum)}}"> {{$praktikum->Praktikum_ID}}</a></td>
                <td><a href="{{route('firmen.show',$praktikum->firmen)}}">{{ $praktikum->firmen->Firmenname}}</a>
                </td>
                <td><a href="{{route('praktika.show',$praktikum)}}">{{ $praktikum['Status'] }}</a></td>
                <td>{{ $praktikum->praktikazeitraeume['Start'] }}</td>
                <td>{{ $praktikum->praktikazeitraeume['Ende'] }}</td>
                <?php $ansprechpartner = $praktikum->firmen->ansprechpartner->first()?>
                <td><a href="{{route('ansprechpartner.show',$ansprechpartner)}}">{{ $ansprechpartner->Nachname}}</a>
                </td>
            </tr>
            @endforeach
        </table>
        {{--ToDo Praktikaliste--}}

    </div>
@endsection
