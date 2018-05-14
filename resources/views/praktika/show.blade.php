@extends('layouts.app')
@section('content')
    <div class="container">

        <ul class="pager">
            <div class=".col-md-4"><a href="{{url()->previous()}}"> zurück</a></div>
            <div class=".col-md-4"><a href="{{Route('praktika.edit')}}"> Praktikum bearbeiten</a></div>
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
                <td>{{ $praktikum->Praktium_ID}}</td>
                <td>{{ $praktikum->firmen}}</td>
                <td>{{ $praktikum->Status}}</td>
                <td>{{ $praktikum->teilnehmer }}</td>
                <td>{{ $praktikum->praktikazeitraeume->start}}</td>
                <td>{{ $praktikum->praktikazeitraeume->ende}}</td>
            </tr>

        </table>
        </div>
    </div>
@endsection
