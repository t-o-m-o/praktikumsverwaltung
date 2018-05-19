@extends('layouts.app')
@section('content')
    <div class="container">

        <div class="row">
            <div class=".col-sm-4"><a href="{{url()->previous()}}" class="btn btn-info"> zurück</a></div>
            <div class=".col-sm-4"><a href="{{route('berufsziel.create')}}" class="btn btn-info"> Berufsziel
                    hinzufügen</a>
            </div>
        </div>
        <ul class="pager">{{$berufsziel->links() }}</ul>
        <hr class="mb-4">
        <div class="table-responsive">
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
    </div>
@endsection
