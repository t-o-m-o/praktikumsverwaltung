@extends('layouts.app')
@section('content')
    <div class="container">

        <ul class="pager">
            <div class=".col-md-4"><a href="{{url()->previous()}}"> zurück</a></div>
            <div class=".col-md-4"><a href="{{Route('praktika.create')}}"> Praktikum hinzufügen</a></div>
            {{$praktika->links() }}
        </ul>
        <div class="table-responsive">
        <table class="table table-hover table-striped">
            <tr>
                <th>ID</th>
                <th>Semester</th>
                <th>Berufsziel</th>
                <th>Teilnehmer</th>
                <th>Firmenname</th>
                <th>Status</th>
                <th>Start</th>
                <th>Ende</th>
                <th>Ansprechpartner</th>
            </tr>
            @foreach($praktika as $praktikum)
                <tr>
                    <td><a href="{{route('praktika.show',$praktikum->Praktikum_ID)}}"> {{$praktikum->Praktikum_ID}}</a>
                    </td>
                    <?php $semester = $praktikum->teilnehmer->semester  ?>
                    <td><a href="semester/{{$semester['Semester_ID']}}">{{ $semester['Semesterbezeichnung']}}</a></td>
                    <td>{{ $praktikum->teilnehmer->berufsziel['Berufszielbezeichnung']}} </td>
                    <td>{{ $praktikum->teilnehmer->Nachname }}</td>
                    <td>{{ $praktikum->firmen->Firmenname }}</td>
                    <td>{{ $praktikum['Status'] }}</td>
                    <td>{{ $praktikum->praktikazeitraeume['Start'] }}</td>
                    <td>{{ $praktikum->praktikazeitraeume['Ende'] }}</td>
                    <?php $ansprechpartner = $praktikum->firmen->ansprechpartner->first()?>
                    <td>
                        <a href="ansprechpartner/{{$ansprechpartner->Ansprechpartner_ID}}">{{ $ansprechpartner->Nachname}}</a>
                    </td>
                </tr>
            @endforeach
        </table>
        </div>
    </div>
@endsection
