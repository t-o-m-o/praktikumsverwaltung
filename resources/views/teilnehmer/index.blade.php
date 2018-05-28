@extends('layouts.app')
@section('content')

    <div class="container-fluid">
        <h3 class="text-center">Teilnehmerliste</h3>

        <div class="btn-group">
            <div class="ml-1">
                <a href="{{route('welcome')}}" class="btn btn-info"> Übersicht</a>
            </div>
            <div class="ml-1"><a href="{{Route('teilnehmer.create')}}" class="btn btn-info"> Teilnehmer
                    hinzufügen</a>
            </div>
        </div>
    </div>
    <hr class="mb-4">
    <div class="table-responsive">
        <ul class="pager">{{$teilnehmer->links() }}</ul>
        <table class="table table-hover table-striped">
            <tr>
                <th>ID</th>
                <th>Nachname</th>
                <th>Vorname</th>
                <th>Berufsziel</th>
                <th>Semester</th>
            </tr>
            @foreach($teilnehmer as $teilnehmerdatensatz)
                <tr>
                    <td>
                        <a href="{{route('teilnehmer.show',$teilnehmerdatensatz)}}"> {{$teilnehmerdatensatz->Teilnehmer_ID}}</a>
                    </td>
                    <td>
                        <a href="{{route('teilnehmer.show',$teilnehmerdatensatz)}}"> {{$teilnehmerdatensatz->Nachname}}</a>
                    </td>
                    <td>
                        <a href="{{route('teilnehmer.show',$teilnehmerdatensatz)}}"> {{$teilnehmerdatensatz->Vorname}}</a>
                    </td>
                    <td>
                        <a href="{{route('berufsziel.show',$teilnehmerdatensatz->berufsziel)}}"> {{$teilnehmerdatensatz->berufsziel['Berufszielbezeichnung']}}</a>
                    </td>
                    <?php $semester = $teilnehmerdatensatz->semester ?>
                    <td><a href="{{route('semester.show',$semester)}}">{{ $semester->Semesterbezeichnung}}</a></td>

                </tr>
            @endforeach
        </table>
    </div>
@endsection
