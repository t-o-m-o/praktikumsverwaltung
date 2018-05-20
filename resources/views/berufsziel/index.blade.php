@extends('layouts.app')
@section('content')

    <div class="container-fluid">
        <h3 class="text-center">Berufsziele</h3>

        <div class="btn-group">
            <div class=".col-md-4  ml-1"><a href="{{route('welcome')}}" class="btn btn-info"> Übersicht</a></div>
            <div class=".col-md-4  ml-1"><a href="{{route('berufsziel.create')}}" class="btn btn-info"> Berufsziel
                    hinzufügen</a>
            </div>
        </div>
    </div>
    <hr class="mb-4">
    <div class="table-responsive">
        <ul class="pager">{{$berufsziel->links() }}</ul>
        <table class="table table-hover table-striped">
            <tr>
                <th>ID</th>
                <th>Bezeichnung</th>
            </tr>
            @foreach($berufsziel as $berufszieldatensatz)
                <tr>
                    <td>
                        <a href="{{route('berufsziel.show',$berufszieldatensatz)}}"> {{$berufszieldatensatz->Berufsziel_ID}}</a>
                    </td>
                    <td>
                        <a href="{{route('berufsziel.show',$berufszieldatensatz)}}"> {{$berufszieldatensatz->Berufszielbezeichnung}}</a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
