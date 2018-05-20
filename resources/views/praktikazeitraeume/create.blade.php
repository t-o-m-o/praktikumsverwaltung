@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h3 class="text-center">Zeitraum hinzufügen</h3>

        <div class="btn-group">
            <div class=".col-md-4 ml-1"><a href="{{route('welcome')}}" class="btn btn-info"> Übersicht</a></div>
            <div class=".col-md-4 ml-1"><a href="{{route('praktikazeitraeume.index')}}" class="btn btn-info">
                    Zeiträume</a></div>
        </div>
    </div>
    <hr class="mb-4">
    <div class="form-group">
        {{Form::open(array('route' => array('praktikazeitraeume.store') ) )}}

        <div class="mb-3">
            <label for="status">Start</label>

            <div class="input-group">
                <input type="date" class="form-control" name="start" id="start" value="{{old('start')}}">
            </div>
        </div>

        <div class="mb-3">
            <label for="vorname">Ende</label>

            <div class="input-group">
                <input type="date" class="form-control" name="ende" id="ende" value="{{old('ende')}}">
            </div>
        </div>

        <hr class="mb-4">

        <button class="btn btn-primary btn-lg btn-block" type="submit" value="store">Zeitraum hinzufügen
        </button>

        {{ Form::close() }}
    </div>
@endsection
