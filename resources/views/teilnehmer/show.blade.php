@extends('layouts.app')
@section('content')
    <div class="container">

        <div class="row">
            <div class=".col-sm-4">
                <a href="{{url()->previous()}}" class="btn btn-info"> zurück</a>
            </div>
            <div class=".col-sm-4">
                <a href="{{route('teilnehmer.edit',$teilnehmer)}}" class="btn btn-warning"> Praktikum bearbeiten</a>
            </div>
            <div class=".col-sm-4">
                {{Form::open(array('route' => array('teilnehmer.destroy',$teilnehmer),'method' => 'DELETE' ) )}}
                {{ Form::submit('Praktikum löschen', array('class' => 'btn btn-danger')) }}
                {{ Form::close() }}
            </div>
        </div>

        <div class="table-responsive">
        <table class="table table-hover table-striped">
            <tr>
                <td>ID</td>
                <td>Firmenname</td>
                <td>Status</td>
                <td>Teilnehmer</td>
                <td>Start</td>
                <td>Ende</td>
            </tr>
            <tr>
                <td>{{ $teilnehmer->Praktikum_ID}}</td>
                <td>{{ $teilnehmer->firmen->Firmenname}}</td>
                <td>{{ $teilnehmer->Status}}</td>
                <td>{{ $teilnehmer->teilnehmer->Nachname }}</td>
                <td>{{ $teilnehmer->praktikazeitraeume->Start}}</td>
                <td>{{ $teilnehmer->praktikazeitraeume->Ende}}</td>
            </tr>
        </table>
        </div>
    </div>
@endsection
