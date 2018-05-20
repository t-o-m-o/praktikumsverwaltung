@extends('layouts.app')
@section('content')

    <div class="container-fluid">
        <h3 class="text-center">Praktikazeitraum bearbeiten</h3>

        <div class="btn-group">
            <div class="ml-1">
                <a href="{{route('welcome')}}" class="btn btn-info"> Übersicht</a>
            </div>
            <div class="ml-1">
                <a href="{{route('praktikazeitraeume.index')}}" class="btn btn-info">
                    Zeiträume</a>
            </div>
            <div class="ml-1">
                <a href="{{route('praktikazeitraeume.create')}}" class="btn btn-info">
                    Zeitraum hinzufügen</a>
            </div>
        </div>
    </div>
    <hr class="mb-4">
    <div class="form-group">
        {{Form::open(array('route' => array('praktikazeitraeume.update',$praktikazeitraeume),'method' => 'PUT' ) )}}

        <div class="mb-3">
            <label for="status">Start</label>

            <div class="input-group">
                <input type="date" class="form-control" name="start" id="start"
                       value="{{$praktikazeitraeume->Start}}">
            </div>
        </div>

        <div class="mb-3">
            <label for="vorname">Ende</label>

            <div class="input-group">
                <input type="date" class="form-control" name="ende" id="ende" value="{{$praktikazeitraeume->Ende}}">
            </div>
        </div>

        <hr class="mb-4">
        <button class="btn btn-primary btn-lg btn-block" type="submit" value="store">Zeitraum bearbeiten</button>
        {{ Form::close() }}
    </div>

@endsection
