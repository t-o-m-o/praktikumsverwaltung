@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <h3 class="text-center">{{$kontaktliste->Kontaktbeschreibung}}</h3>

        <div class="text-center">{{$kontaktliste->Datum}}</div>
        <div class="text-center">{{$kontaktliste->praktika->firmen->Firmenname}}</div>
        <div class="text-center">{{$kontaktliste->praktika->teilnehmer->Vorname}}
            , {{$kontaktliste->praktika->teilnehmer->Nachname}}</div>


        <div class="btn-group">
            <div class="ml-1">
                <a href="{{route('welcome')}}" class="btn btn-info"> Übersicht</a>
            </div>
            <div class="ml-1">
                <a href="{{route('kontaktliste.index')}}" class="btn btn-info"> Kontakliste</a>
            </div>
            <div class="ml-1">
                <a href="{{route('kontaktliste.edit',$kontaktliste)}}" class="btn btn-warning"> Kontakt
                    bearbeiten</a>
            </div>
            <div class="ml-1">
                {{ Form::open(array('route' => array('kontaktliste.destroy',$kontaktliste),'method' => 'DELETE' ) )}}
                {{ Form::submit('Kontakt löschen', array('class' => 'btn btn-danger')) }}
                {{ Form::close() }}
            </div>
        </div>
    </div>
    <hr class="mb-4">
    <?php $praktikum = $kontaktliste->praktika ?>
    <h3>Praktikum</h3>

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
        </table>
    </div>

@endsection