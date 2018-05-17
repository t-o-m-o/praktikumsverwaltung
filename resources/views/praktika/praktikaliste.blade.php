@extends('layouts.app')
@section('content')
    <div class="container">

        <div class="row">
            <div class=".col-sm-4"><a href="{{url()->previous()}}" class="btn btn-info"> zurück</a></div>
            <div class=".col-sm-4"><a href="{{Route('praktika.create')}}" class="btn btn-info"> Praktikum hinzufügen</a>
            </div>
        </div>
        <ul class="pager">{{$praktika->links() }}</ul>
        <hr class="mb-4">
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
                    <td><a href="{{route('praktika.show',$praktikum)}}"> {{$praktikum->Praktikum_ID}}</a>
                    </td>
                    <?php $semester = $praktikum->teilnehmer->semester  ?>
                    <td><a href="{{route('semester.show',$semester)}}">{{ $semester['Semesterbezeichnung']}}</a></td>
                    <td>
                        <a href="{{route('berufsziel.show',$praktikum->teilnehmer->berufsziel)}}">{{ $praktikum->teilnehmer->berufsziel['Berufszielbezeichnung']}}</a>
                    </td>
                    <td>
                        <a href="{{route('teilnehmer.show',$praktikum->teilnehmer)}}"> {{$praktikum->teilnehmer->Nachname}}</a>
                    <td><a href="{{route('firmen.show',$praktikum->firmen)}}">{{ $praktikum->firmen->Firmenname}}</a>
                    </td>
                    <td><a href="{{route('praktika.show',$praktikum)}}">{{ $praktikum['Status'] }}</a></td>
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
