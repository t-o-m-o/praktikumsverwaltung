@extends('layouts.app')
@section('content')
    <div class="container">

        <div class="row">
            <div class=".col-sm-4">
                <a href="{{url()->previous()}}" class="btn btn-info"> zurück</a>
            </div>
            <div class=".col-sm-4">
                <a href="{{route('semester.edit',$semester)}}" class="btn btn-warning"> Semester bearbeiten</a>
            </div>
            <div class=".col-sm-4">
                {{Form::open(array('route' => array('semester.destroy',$semester),'method' => 'DELETE' ) )}}
                {{ Form::submit('Semester löschen', array('class' => 'btn btn-danger')) }}
                {{ Form::close() }}
            </div>
        </div>

        <?php

        use App\teilnehmer;
        $teilnhemer = $semester->teilnehmer;
        ?>
        <div class="table-responsive">
            <h3>{{$semester->Semesterbezeichnung}}</h3>
        <table class="table table-hover table-striped">
            <tr>
                <td>Berufsziel</td>
                <td>Nachname</td>
                <td>Vorname</td>
            </tr>

            @foreach($teilnhemer as $teilnehmerdatensatz)

            <tr>
                <td>{{ $teilnehmerdatensatz->berufsziel->Berufszielbezeichnung}}</td>
                <td>{{ $teilnehmerdatensatz['Nachname']}}</td>
                <td>{{ $teilnehmerdatensatz['Vorname'] }}</td>
            </tr>
            @endforeach


        </table>
    </div>
    </div>
@endsection
