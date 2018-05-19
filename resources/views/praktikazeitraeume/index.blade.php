@extends('layouts.app')
@section('content')

    <div class="row">
        <div class=".col-sm-4"><a href="{{url()->previous()}}" class="btn btn-info"> zurück</a></div>
        <div class=".col-sm-4"><a href="{{route('praktikazeitraeume.create')}}" class="btn btn-info"> Zeitraum
                hinzufügen</a>
        </div>
    </div>
    <ul class="pager">{{$praktikazeitraeume->links() }}</ul>
    <hr class="mb-4">
    <div class="table-responsive">
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