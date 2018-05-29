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
    $mitpraktikum = DB::table('teilnehmer')
        ->select('teilnehmer.Teilnehmer_ID')
        ->where('teilnehmer.Semester_ID',$semester->Semester_ID)
        ->Join('praktika', 'teilnehmer.Teilnehmer_ID', '=', 'praktika.Teilnehmer_ID')
        ->where('praktika.Status','=','zusage');


/*    $ohnepraktikum = DB::table('teilnehmer')
        ->where('Semester_ID',$semester->Semester_ID)
        ->leftJoin('praktika', 'teilnehmer.Teilnehmer_ID', '=', 'praktika.Teilnehmer_ID')
        ->whereNotIn('teilnehmer.Teilnehmer_ID', $mitpraktikum->get()->Teilnehmer_ID )
        ->where('praktika.Status','<>','"zusage"')
        ->orWhereNull('praktika.Status')
        ->select('teilnehmer.Teilnehmer_ID','teilnehmer.Nachname','teilnehmer.Vorname','praktika.Status')
        ->get();*/

    $mitpraktikum->get()->toArray();
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
            @foreach($mitpraktikum as $teilnehmer)
                <td><?php //var_dump($teilnehmer['Vorname']) ?></td>
            @endforeach
        </table>
    </div>

    <div class="table-responsive">
        <h3>Teilnehmer mit Praktikum</h3>
        <table class="table table-hover table-striped">
            <tr>
                <th>Berufsziel</th>
                <th>Nachname</th>
                <th>Vorname</th>
            </tr>


        </table>
    </div>
@endsection
