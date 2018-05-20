@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <h3 class="text-center">Semester</h3>

        <div class="btn-group">
            <div class=".col-sm-4 ml-1"><a href="{{route('welcome')}}" class="btn btn-info"> Übersicht</a></div>
            <div class=".col-sm-4 ml-1"><a href="{{Route('semester.create')}}" class="btn btn-info"> Semester
                    hinzufügen</a>
            </div>
        </div>
    </div>
    <hr class="mb-4">
    <div class="table-responsive">
        <ul class="pager">{{$semester->links() }}</ul>
        <table class="table table-hover table-striped">
            <tr>
                <th>ID</th>
                <th>Bezeichnung</th>
            </tr>
            @foreach($semester as $semesterdatensatz)
                <tr>
                    <td><a href="{{route('semester.show',$semesterdatensatz)}}"> {{$semesterdatensatz->Semester_ID}}</a>
                    </td>
                    <td>
                        <a href="{{route('semester.show',$semesterdatensatz)}}"> {{$semesterdatensatz->Semesterbezeichnung}}</a>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
