@extends('layouts.app')
@section('content')
    <div class="container">

        <ul class="pager">
            <div class=".col-md-4"><a href="{{url()->previous()}}"> zurück</a></div>
            <div class=".col-md-4"><a href="{{route('praktika.edit',$praktika)}}"> Praktikum
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
                <td>{{ $praktika->Praktikum_ID}}</td>
                <td>{{ $praktika->firmen->Firmenname}}</td>
                <td>{{ $praktika->Status}}</td>
                <td>{{ $praktika->teilnehmer->Nachname }}</td>
                <td>{{ $praktika->praktikazeitraeume->Start}}</td>
                <td>{{ $praktika->praktikazeitraeume->Ende}}</td>
            </tr>
        </table>
        </div>
    </div>
@endsection
