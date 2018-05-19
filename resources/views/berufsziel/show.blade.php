@extends('layouts.app')
@section('content')
    <div class="container">
        <h2>{{$berufsziel->Berufszielbezeichnung}}</h2>
    </div>
    <div class="row">
        <div class=".col-sm-4">
            <a href="{{url()->previous()}}" class="btn btn-info"> zurück</a>
        </div>
        <div class=".col-sm-4">
            <a href="{{route('berufsziel.edit',$berufsziel)}}" class="btn btn-warning"> Berufsziel bearbeiten</a>
        </div>
        <div class=".col-sm-4">
            {{ Form::open(array('route' => array('berufsziel.destroy',$berufsziel),'method' => 'DELETE' ) )}}
            {{ Form::submit('Berufsziel löschen', array('class' => 'btn btn-danger')) }}
            {{ Form::close() }}
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