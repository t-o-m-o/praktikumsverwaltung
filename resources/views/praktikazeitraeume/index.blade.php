@extends('layouts.app')
@section('content')

    <div class="container-fluid">
        <h3 class="text-center">Ansprechpartner</h3>

        <div class="btn-group">
            <div class="ml-1"><a href="{{route('welcome')}}" class="btn btn-info"> Übersicht</a></div>
            <div class="ml-1"><a href="{{route('praktikazeitraeume.create')}}" class="btn btn-info"> Zeitraum
                    hinzufügen</a>
            </div>
        </div>
    </div>

    <hr class="mb-4">
    <div class="table-responsive">
        <ul class="pager">{{$praktikazeitraeume->links() }}</ul>
        <table class="table table-hover table-striped">
            <tr>
                <th>ID</th>
                <th>Start</th>
                <th>Ende</th>
            </tr>
            @foreach($praktikazeitraeume as $praktikazeitraum)
                <tr>
                    <td>
                        <a href="{{route('praktikazeitraeume.show',$praktikazeitraum)}}"> {{$praktikazeitraum->Praktikumszeit_ID}}</a>
                    </td>
                    <td>
                        <a href="{{route('praktikazeitraeume.show',$praktikazeitraum)}}"> {{$praktikazeitraum->Start}}</a>
                    </td>
                    <td>
                        <a href="{{route('praktikazeitraeume.show',$praktikazeitraum)}}"> {{$praktikazeitraum->Ende}}</a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection