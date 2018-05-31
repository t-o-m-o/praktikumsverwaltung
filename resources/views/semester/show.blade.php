@extends('layouts.app')
@section('content')

    <div class="container-fluid">
        <h3 class="text-center">Semester</h3>

        <h3 class="text-center">{{$semester->Semesterbezeichnung}}</h3>

        <div class="btn-group">
            <div class="ml-1">
                <a href="{{route('welcome')}}" class="btn btn-info"> Übersicht</a>
            </div>
            <div class="ml-1">
                <a href="{{route('semester.index')}}" class="btn btn-info"> Semesterliste</a>
            </div>
            <div class="ml-1">
                <a href="{{route('semester.edit',$semester)}}" class="btn btn-warning"> Semester bearbeiten</a>
            </div>
            <div class="ml-1">
                {{Form::open(array('route' => array('semester.destroy',$semester),'method' => 'DELETE' ) )}}
                {{ Form::submit('Semester löschen', array('class' => 'btn btn-danger')) }}
                {{ Form::close() }}
            </div>
        </div>
    </div>
    <hr class="mb-4">
    <?php

    use App\teilnehmer;
    use App\praktika;

    //$teilnehmerliste->leftJoin('praktika', 'Teilnehmer_ID', '=', 'Teilnehmer_ID');
    //$mitpraktikum = DB::table('praktika')->where('Status','zusage')->exists();
    $liste[] = null;
    $mitpraktikum = DB::table('teilnehmer')
        ->select('teilnehmer.Teilnehmer_ID', 'teilnehmer.Nachname',
            'teilnehmer.Vorname', 'praktika.Status', 'berufsziel.Berufszielbezeichnung',
            'berufsziel.Berufsziel_ID')
        ->where('teilnehmer.Semester_ID',$semester->Semester_ID)
        ->Join('berufsziel','teilnehmer.Berufsziel_ID','=','berufsziel.Berufsziel_ID')
        ->Join('praktika', 'teilnehmer.Teilnehmer_ID', '=', 'praktika.Teilnehmer_ID')
        ->where('praktika.Status', '=', 'zusage')
        ->get();
    ?>
    <div class="table-responsive">
        <h3>Teilnehmer mit Praktikum</h3>
        <table class="table table-hover table-striped">
            <tr>
                <th>Berufsziel</th>
                <th>Nachname</th>
                <th>Vorname</th>
            </tr>
            @foreach($mitpraktikum as $teilnehmer)
                <tr>
                    <?php $liste[] = $teilnehmer->Teilnehmer_ID?>
                    <td><a href="{{route('berufsziel.show',$teilnehmer->Berufsziel_ID)}}">{{$teilnehmer->Berufszielbezeichnung}}</a></td>
                        <td><a href="{{route('teilnehmer.show',$teilnehmer->Teilnehmer_ID)}}"> {{$teilnehmer->Nachname}}</a></td>
                        <td><a href="{{route('teilnehmer.show',$teilnehmer->Teilnehmer_ID)}}"> {{$teilnehmer->Vorname}}</a></td>
                </tr>
            @endforeach

        </table>
    </div>
    <?php
        $ohnepraktikum = DB::table('teilnehmer')
            ->select('teilnehmer.Teilnehmer_ID','teilnehmer.Nachname','teilnehmer.Vorname','praktika.Status',
                'praktika.Praktikum_ID','berufsziel.Berufszielbezeichnung','berufsziel.Berufsziel_ID')
            ->leftJoin('praktika', 'teilnehmer.Teilnehmer_ID', '=', 'praktika.Teilnehmer_ID')
            ->Join('berufsziel', 'teilnehmer.Berufsziel_ID', '=', 'berufsziel.Berufsziel_ID')
            ->where('Semester_ID',$semester->Semester_ID)
            ->where(function ($query) {
                $query->where('praktika.Status', '!=', '"zusage"')
                    ->orwhereNull('praktika.Status');
            })
            ->get();
    ?>

    <div class="table-responsive">
        <h3>Teilnehmer ohne Praktikum</h3>
        <table class="table table-hover table-striped">
            <tr>
                <th>Berufsziel</th>
                <th>Nachname</th>
                <th>Vorname</th>
                <th>Status</th>
            </tr>
            @foreach($ohnepraktikum as $teilnehmer)
                @if(!in_array($teilnehmer->Teilnehmer_ID,$liste))
                <tr>
                    <td><a href="{{route('berufsziel.show',$teilnehmer->Berufsziel_ID)}}">{{$teilnehmer->Berufszielbezeichnung}}</a></td>
                    <td><a href="{{route('teilnehmer.show',$teilnehmer->Teilnehmer_ID)}}"> {{$teilnehmer->Nachname}}</a></td>
                    <td><a href="{{route('teilnehmer.show',$teilnehmer->Teilnehmer_ID)}}"> {{$teilnehmer->Vorname}}</a></td>
                    @isset($teilnehmer->Praktikum_ID)
                        <td><a href="{{route('praktika.show',$teilnehmer->Praktikum_ID)}}">{{ $teilnehmer->Status}}</a></td>
                    @else
                        <td>keine Bewerbungen</td>
                    @endisset
                </tr>
                @endif
            @endforeach
        </table>
    </div>




@endsection
