@extends('layouts.app')
@section('content')

    <div class="container-fluid">
        <h3 class="text-center">Semester</h3>

        <h3 class="text-center">{{$semester->Semesterbezeichnung}}</h3>

        <div class="btn-group">
            <div class="ml-1">
                <a href="{{route('welcome')}}" class="btn btn-info"> Übersicht</a>
            </div>
            <div class="ml-1">
                <a href="{{route('semester.index')}}" class="btn btn-info"> Semesterliste</a>
            </div>
            <div class="ml-1">
                <a href="{{route('semester.edit',$semester)}}" class="btn btn-warning"> Semester bearbeiten</a>
            </div>
            <div class="ml-1">
                {{Form::open(array('route' => array('semester.destroy',$semester),'method' => 'DELETE' ) )}}
                {{ Form::submit('Semester löschen', array('class' => 'btn btn-danger')) }}
                {{ Form::close() }}
            </div>
        </div>
    </div>
    <hr class="mb-4">
    <?php

    use App\teilnehmer;
    $teilnhemer = $semester->teilnehmer;
    ?>
    <div class="table-responsive">
        <h3>Teilnehmer ohne Praktikum</h3>
        <table class="table table-hover table-striped">
            <tr>
                <th>Berufsziel</th>
                <th>Nachname</th>
                <th>Vorname</th>
            </tr>

            @foreach($teilnhemer as $teilnehmerdatensatz)
                <tr>
                    <td>
                        <a href="{{route('berufsziel.show',$teilnehmerdatensatz->berufsziel)}}"> {{$teilnehmerdatensatz->berufsziel['Berufszielbezeichnung']}}</a>
                    </td>
                    <td>
                        <a href="{{route('teilnehmer.show',$teilnehmerdatensatz)}}"> {{$teilnehmerdatensatz->Nachname}}</a>
                    </td>
                    <td>
                        <a href="{{route('teilnehmer.show',$teilnehmerdatensatz)}}"> {{$teilnehmerdatensatz->Vorname}}</a>
                    </td>
                </tr>
            @endforeach

        </table>
    </div>

    <div class="table-responsive">
        <h3>Teilnehmer mit Praktikum</h3>
        <table class="table table-hover table-striped">
            <tr>
                <th>Berufsziel</th>
                <th>Nachname</th>
                <th>Vorname</th>
            </tr>

            @foreach($teilnhemer as $teilnehmerdatensatz)
                <tr>
                    <td>
                        <a href="{{route('berufsziel.show',$teilnehmerdatensatz->berufsziel)}}"> {{$teilnehmerdatensatz->berufsziel['Berufszielbezeichnung']}}</a>
                    </td>
                    <td>
                        <a href="{{route('teilnehmer.show',$teilnehmerdatensatz)}}"> {{$teilnehmerdatensatz->Nachname}}</a>
                    </td>
                    <td>
                        <a href="{{route('teilnehmer.show',$teilnehmerdatensatz)}}"> {{$teilnehmerdatensatz->Vorname}}</a>
                    </td>
                </tr>
            @endforeach

        </table>
    </div>
@endsection
