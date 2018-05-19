@extends('layouts.app')
@section('content')
    <h3>{{$teilnehmer->Vorname." ".$teilnehmer->Nachname.", ".$teilnehmer->semester->Semesterbezeichnung}}</h3>
    <div class="row">
        <div class=".col-sm-4">
            <a href="{{url()->previous()}}" class="btn btn-info"> zurück</a>
        </div>
        <div class=".col-sm-4">
            <a href="{{route('teilnehmer.edit',$teilnehmer)}}" class="btn btn-warning"> Teilnehmer bearbeiten</a>
        </div>
        <div class=".col-sm-4">
            {{Form::open(array('route' => array('teilnehmer.destroy',$teilnehmer),'method' => 'DELETE' ) )}}
            {{ Form::submit('Teilnehmer löschen', array('class' => 'btn btn-danger')) }}
            {{ Form::close() }}
        </div>
    </div>

    <div class="table-responsive">

        <table class="table table-hover table-striped">
            <tr>
                <th>ID</th>
                <th>Semester</th>
                <th>Berufsziel</th>
                <th>Firmenname</th>
                <th>Status</th>
                <th>Start</th>
                <th>Ende</th>
                <th>Ansprechpartner</th>
            </tr>
            <?php $praktika = $teilnehmer->praktika; ?>
            <h3>Praktika:</h3>
            @foreach($praktika as $praktikum)
            <tr>
                <td><a href="{{route('praktika.show',$praktikum)}}"> {{$praktikum->Praktikum_ID}}</a></td>
                <?php $semester = $praktikum->teilnehmer->semester  ?>
                <td><a href="{{route('semester.show',$semester)}}">{{ $semester['Semesterbezeichnung']}}</a></td>
                <td>
                    <a href="{{route('berufsziel.show',$praktikum->teilnehmer->berufsziel)}}">{{ $praktikum->teilnehmer->berufsziel['Berufszielbezeichnung']}}</a>
                </td>
                <td><a href="{{route('firmen.show',$praktikum->firmen)}}">{{ $praktikum->firmen->Firmenname}}</a>
                </td>
                <td><a href="{{route('praktika.show',$praktikum)}}">{{ $praktikum['Status'] }}</a></td>
                <td>{{ $praktikum->praktikazeitraeume['Start'] }}</td>
                <td>{{ $praktikum->praktikazeitraeume['Ende'] }}</td>
                <?php $ansprechpartner = $praktikum->firmen->ansprechpartner->first()?>
                <td><a href="{{route('ansprechpartner.show',$ansprechpartner)}}">{{ $ansprechpartner->Nachname}}</a>
                </td>
            </tr>
            @endforeach
        </table>
        {{--ToDo Praktikaliste--}}

    </div>
@endsection
