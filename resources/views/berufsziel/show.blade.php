@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <h3 class="text-center">{{$berufsziel->Berufszielbezeichnung}}</h3>

        <div class="btn-group">
            <div class=".col-md-4 ml-1"><a href="{{route('welcome')}}" class="btn btn-info"> Übersicht</a></div>
            <div class=".col-md-4 ml-1"><a href="{{route('berufsziel.index')}}" class="btn btn-info">
                    Ansprechpartnerliste</a></div>
            <div class=".col-sm-4 ml-1">
                <a href="{{route('berufsziel.edit',$berufsziel)}}" class="btn btn-warning ml-1"> Berufsziel
                    bearbeiten</a>
            </div>
            <div class=".col-sm-4">
                {{ Form::open(array('route' => array('berufsziel.destroy',$berufsziel),'method' => 'DELETE' ) )}}
                {{ Form::submit('Berufsziel löschen', array('class' => 'btn btn-danger ml-1')) }}
                {{ Form::close() }}
            </div>
        </div>
    </div>
    <hr class="mb-4">
    <?php $teilnehmer = $berufsziel->teilnehmer ?>
    <h3>Teilnehmer</h3>

    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <tr>
                <th>Semester</th>
                <th>ID</th>
                <th>Vorname</th>
                <th>Nachname</th>
            </tr>
            @foreach($teilnehmer as $teilnehmerdatensatz)
                <tr>
                    <td>
                        <a href="{{route('semester.show',$teilnehmerdatensatz->semester)}}"> {{$teilnehmerdatensatz->semester->Semesterbezeichnung}}</a>
                    </td>
                    <td>
                        <a href="{{route('teilnehmer.show',$teilnehmerdatensatz)}}"> {{$teilnehmerdatensatz->Teilnehmer_ID}}</a>
                    </td>
                    <td>
                        <a href="{{route('teilnehmer.show',$teilnehmerdatensatz)}}"> {{$teilnehmerdatensatz->Vorname}}</a>
                    </td>
                    <td>
                        <a href="{{route('teilnehmer.show',$teilnehmerdatensatz)}}"> {{$teilnehmerdatensatz->Nachname}}</a>
                    </td>
                </tr>
            @endforeach

        </table>
    </div>

@endsection