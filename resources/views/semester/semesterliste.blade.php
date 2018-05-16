@extends('layouts.app')
@section('content')
    <div class="container">

        <div class="row">
            <div class=".col-sm-4"><a href="{{url()->previous()}}" class="btn btn-info"> zurück</a></div>
            <div class=".col-sm-4"><a href="{{Route('semester.create')}}" class="btn btn-info"> Semester hinzufügen</a>
            </div>
        </div>
        <ul class="pager">{{$semester->links() }}</ul>
        <hr class="mb-4">
        <div class="table-responsive">
        <table class="table table-hover table-striped">
            <tr>
                <th>ID</th>
                <th>Bezeichnung</th>
            </tr>
            @foreach($semester as $semesterdatensatz)
                <tr>
                    <td><a href="{{route('semester.show',$semesterdatensatz)}}"> {{$semesterdatensatz->Semester_ID}}</a>
                    </td>
                    <td><a href="{{route('semester.show',$semesterdatensatz)}}"> {{$semesterdatensatz->Semesterbezeichnung}}</a>
                </tr>
            @endforeach
        </table>
        </div>
    </div>
@endsection
