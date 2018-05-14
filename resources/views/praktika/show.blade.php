@extends('layouts.app')
@section('content')
    <div class="container">

        <ul class="pager">
            <div class=".col-md-4"><a href="{{url()->previous()}}"> zurück</a></div>
            <div class=".col-md-4"><a href="{{route('praktika.edit',$praktikum->Praktikum_ID)}}"> Praktikum
                    bearbeiten</a></div>
        </ul>

        <div class="table-responsive">
        <table class="table table-hover table-striped">
            <tr>
                <td>ID</td>
                <td>Firmenname</td>
                <td>Status</td>
                <td>Teilnehmer</td>
                <td>Start</td>
                <td>Ende</td>
            </tr>
            <tr>
                <td>{{ $praktikum->Praktikum_ID}}</td>
                <td>{{ $praktikum->firmen->Firmenname}}</td>
                <td>{{ $praktikum->Status}}</td>
                <td>{{ $praktikum->teilnehmer->Nachname }}</td>
                <td>{{ $praktikum->praktikazeitraeume->Start}}</td>
                <td>{{ $praktikum->praktikazeitraeume->Ende}}</td>
            </tr>
        </table>
        </div>
    </div>
@endsection
