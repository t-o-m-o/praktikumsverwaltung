@extends('layouts.app')
@section('content')
    <div class="container">

        <div class="row">
            <div class=".col-sm-4">
                <a href="{{url()->previous()}}" class="btn btn-info"> zurück</a>
            </div>
            <div class=".col-sm-4">
                <a href="{{route('teilnehmer.edit',$teilnehmer)}}" class="btn btn-warning"> Teilnehmer bearbeiten</a>
            </div>
            <div class=".col-sm-4">
                {{Form::open(array('route' => array('teilnehmer.destroy',$teilnehmer),'method' => 'DELETE' ) )}}
                {{ Form::submit('Teilnehmer löschen', array('class' => 'btn btn-danger')) }}
                {{ Form::close() }}
            </div>
        </div>

        <div class="table-responsive">
            <h3>{{$teilnehmer->Vorname." ".$teilnehmer->Nachname.", ".$teilnehmer->semester->Semesterbezeichnung}}</h3>
        <table class="table table-hover table-striped">
            <tr>
                <th>ID</th>
                <th>Semester</th>
                <th>Berufsziel</th>
                <th>Firmenname</th>
                <th>Status</th>
                <th>Start</th>
                <th>Ende</th>
            </tr>
            <?php $praktika = $teilnehmer->praktika; ?>
            @foreach($praktika as $praktikum)
            <tr>
                <td>{{ $praktikum->Semester_ID}}</td>
                <td>{{ $praktikum->teilnehmer->semester->Semesterbezeichnung}}</td>
                <td>{{ $praktikum->teilnehmer->berufsziel->Berufszielbezeichnung }}</td>
                <td>{{ $praktikum->firmen->Firmenname}}</td>
                <td>{{ $praktikum->Status}}</td>
                <td>{{ $praktikum->praktikazeitraeume->Start}}</td>
                <td>{{ $praktikum->praktikazeitraeume->Ende}}</td>
            </tr>
            @endforeach
        </table>
            {{--ToDo Praktikaliste--}}

        </div>
    </div>
@endsection
