@extends('layouts.app')
@section('content')

    <div class="container-fluid">
        <h3 class="text-center">Semester bearbeiten</h3>

        <div class="btn-group">
            <div class=".col-md-4 ml-1">
                <a href="{{route('welcome')}}" class="btn btn-info"> Übersicht</a>
            </div>
            <div class=".col-md-4 ml-1">
                <a href="{{route('semester.index')}}" class="btn btn-info">
                    Semesterliste</a>
            </div>
            <div class=".col-md-4 ml-1">
                <a href="{{route('semester.create')}}" class="btn btn-info">
                    Semester hinzufügen</a>
            </div>
        </div>
    </div>
    <hr class="mb-4">
    <div class="form-group">
        {{Form::open(array('route' => array('semester.update',$semester),'method' => 'PUT' ) )}}


        <div class="mb-3">
            <label for="bezeichnung">Bezeichnung</label>

            <div class="input-group">
                <input type="text" class="form-control" name="bezeichnung" id="bezeichnung"
                       value="{{$semester->Semesterbezeichnung}}">
            </div>
        </div>

        <hr class="mb-4">

        <button class="btn btn-primary btn-lg btn-block" type="submit" value="store">Semester bearbeiten</button>

    </div>


    {{ Form::close() }}

@endsection
