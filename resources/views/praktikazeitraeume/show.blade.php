@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <h3 class="text-center">Zeitraum</h3>

        <h3 class="text-center">{{$praktikazeitraeume->Start}} bis {{ $praktikazeitraeume->Ende}}</h3>

        <div class="btn-group">
            <div class="ml-1">
                <a href="{{route('welcome')}}" class="btn btn-info"> Übersicht</a>
            </div>
            <div class="ml-1">
                <a href="{{route('praktikazeitraeume.index')}}" class="btn btn-info"> Zeiträume</a>
            </div>
            <div class="ml-1">
            <a href="{{route('praktikazeitraeume.edit',$praktikazeitraeume)}}" class="btn btn-warning"> Zeitraum
                bearbeiten</a>
        </div>
            <div class="ml-1">
            {{ Form::open(array('route' => array('praktikazeitraeume.destroy',$praktikazeitraeume),'method' => 'DELETE' ) )}}
            {{ Form::submit('Zeitraum löschen', array('class' => 'btn btn-danger')) }}
            {{ Form::close() }}
        </div>
    </div>
    </div>
    <hr class="mb-4">
    <?php $praktika = $praktikazeitraeume->praktika ?>
    <h3>Praktika</h3>

    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <tr>
                <th>ID</th>
                <th>Semester</th>
                <th>Berufsziel</th>
                <th>Teilnehmer</th>
                <th>Firmenname</th>
                <th>Status</th>
                <th>Ansprechpartner</th>
            </tr>
            @foreach($praktika as $praktikum)
                <tr>
                    <td><a href="{{route('praktika.show',$praktikum)}}"> {{$praktikum->Praktikum_ID}}</a></td>
                    <?php $semester = $praktikum->teilnehmer->semester  ?>
                    <td><a href="{{route('semester.show',$semester)}}">{{ $semester['Semesterbezeichnung']}}</a>
                    </td>
                    <td>
                        <a href="{{route('berufsziel.show',$praktikum->teilnehmer->berufsziel)}}">{{ $praktikum->teilnehmer->berufsziel['Berufszielbezeichnung']}}</a>
                    </td>
                    <td>
                        <a href="{{route('teilnehmer.show',$praktikum->teilnehmer)}}"> {{$praktikum->teilnehmer->Nachname}}</a>
                    </td>
                    <td>
                        <a href="{{route('firmen.show',$praktikum->firmen)}}">{{ $praktikum->firmen->Firmenname}}</a>
                    </td>
                    <td><a href="{{route('praktika.show',$praktikum)}}">{{ $praktikum['Status'] }}</a></td>
                    <?php $ansprechpartner = $praktikum->firmen->ansprechpartner->first()?>
                    <td>
                        <a href="{{route('ansprechpartner.show',$ansprechpartner)}}">{{ $ansprechpartner->Nachname}}</a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>

@endsection