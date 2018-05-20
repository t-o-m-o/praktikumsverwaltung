@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h3 class="text-center">Semester hinzufügen</h3>

        <div class="btn-group">
            <div class=".col-md-4 ml-1"><a href="{{route('welcome')}}" class="btn btn-info"> Übersicht</a></div>
            <div class=".col-md-4 ml-1"><a href="{{route('semester.index')}}" class="btn btn-info">
                    Semesterliste</a>
            </div>
        </div>
    </div>
    <hr class="mb-4">
    <div class="form-group">
        {{Form::open(array('route' => array('semester.store') ) )}}
        <div class="mb-3">

            <div class="mb-3">
                <label for="bezeichnung">Bezeichnung</label>

                <div class="input-group">
                    <input type="text" class="form-control" name="bezeichnung" id="bezeichnung"
                           value="{{old('bezeichnung')}}">
                </div>
            </div>

            <hr class="mb-4">

            <button class="btn btn-primary btn-lg btn-block" type="submit" value="store">Semester hinzufügen</button>

            {{ Form::close() }}
        </div>
    </div>
@endsection
