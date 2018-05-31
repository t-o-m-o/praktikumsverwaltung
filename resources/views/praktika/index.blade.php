@extends('layouts.app')
@section('content')

    <div class="container-fluid">
        <h3 class="text-center">Praktika</h3>

        <div class="btn-group">
            <div class="ml-1"><a href="{{route('welcome')}}" class="btn btn-info"> Übersicht</a></div>
            <div class="ml-1"><a href="{{Route('praktika.create')}}" class="btn btn-info"> Praktikum
                    hinzufügen</a>
            </div>
        </div>
    </div>
    <hr class="mb-4">
    <div class="table-responsive">
        <ul class="pager">{{$praktika->links() }}</ul>
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
                    <td><a href="{{route('praktika.show',$praktikum)}}"> {{$praktikum->Praktikum_ID}}</a></td>
                    <?php $semester = $praktikum->teilnehmer->semester  ?>
                    <td><a href="{{route('semester.show',$semester)}}">{{ $semester['Semesterbezeichnung']}}</a></td>
                    <td>
                        <a href="{{route('berufsziel.show',$praktikum->teilnehmer->berufsziel)}}">{{ $praktikum->teilnehmer->berufsziel['Berufszielbezeichnung']}}</a>
                    </td>
                    <td>
                        <a href="{{route('teilnehmer.show',$praktikum->teilnehmer)}}"> {{$praktikum->teilnehmer->Nachname}}</a>
                    </td>
                    <td><a href="{{route('firmen.show',$praktikum->firmen)}}">{{ $praktikum->firmen->Firmenname}}</a>
                    </td>
                    <td><a href="{{route('praktika.show',$praktikum)}}">{{ $praktikum['Status'] }}</a></td>
                    <td>
                        <a href="{{route('praktikazeitraeume.show',$praktikum->praktikazeitraeume)}}">
                            {{ $praktikum->praktikazeitraeume->Start}}
                        </a>
                    </td>
                    <td>
                        <a href="{{route('praktikazeitraeume.show',$praktikum->praktikazeitraeume)}}">
                            {{ $praktikum->praktikazeitraeume->Ende}}
                        </a>
                    </td>
                    <?php $ansprechpartner = $praktikum->firmen->ansprechpartner->first()?>
                    @isset($ansprechpartner)
                        <td>
                            <a href="{{route('ansprechpartner.show',$ansprechpartner)}}">{{ $ansprechpartner->Nachname}}</a>
                        </td>
                    @else
                        <td>kein Ansprechpartner</td>
                    @endisset
                </tr>
            @endforeach
        </table>
    </div>
@endsection
