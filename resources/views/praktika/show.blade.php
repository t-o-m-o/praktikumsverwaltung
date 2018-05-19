@extends('layouts.app')
@section('content')

    <div class="row">
        <div class=".col-sm-4">
            <a href="{{url()->previous()}}" class="btn btn-info"> zurück</a>
        </div>
        <div class=".col-sm-4">
            <a href="{{route('praktika.edit',$praktika)}}" class="btn btn-warning"> Praktikum bearbeiten</a>
        </div>
        <div class=".col-sm-4">
            {{Form::open(array('route' => array('praktika.destroy',$praktika),'method' => 'DELETE' ) )}}
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
                <td>{{ $praktika->Praktikum_ID}}</td>
                <td>{{ $praktika->firmen->Firmenname}}</td>
                <td>{{ $praktika->Status}}</td>
                <td>{{ $praktika->teilnehmer->Nachname }}</td>
                <td>{{ $praktika->praktikazeitraeume->Start}}</td>
                <td>{{ $praktika->praktikazeitraeume->Ende}}</td>
            </tr>
        </table>
    </div>
@endsection
