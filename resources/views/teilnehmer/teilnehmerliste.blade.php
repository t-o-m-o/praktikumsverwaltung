@extends('layouts.app')
@section('content')
    <div class="container">

        <div class="row">
            <div class=".col-sm-4"><a href="{{url()->previous()}}" class="btn btn-info"> zurück</a></div>
            <div class=".col-sm-4"><a href="{{Route('teilnehmer.create')}}" class="btn btn-info"> Teilnehmer
                    hinzufügen</a>
            </div>
        </div>
        <ul class="pager">{{$teilnehmer->links() }}</ul>
        <hr class="mb-4">
        <div class="table-responsive">
            <h3>Teilnehmerliste</h3>
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
                        <td>{{ $teilnehmerdatensatz->Nachname }}</td>
                        <td>{{ $teilnehmerdatensatz->Vorname }}</td>
                        <td>{{ $teilnehmerdatensatz->berufsziel['Berufszielbezeichnung']}} </td>
                        <?php $semester = $teilnehmerdatensatz->semester ?>
                        <td><a href="semester/{{$semester['Semester_ID']}}">{{ $semester['Semesterbezeichnung']}}</a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
