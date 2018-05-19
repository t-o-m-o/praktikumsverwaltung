@extends('layouts.app')
@section('content')

    <div class="container">

        <div class="row">
            <div class=".col-sm-4"><a href="{{url()->previous()}}" class="btn btn-info"> zurück</a></div>
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
        </div>


        {{ Form::close() }}


        @if(count($errors))
            <hr class="mb-4">
            <div class="alert">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>

        @endif

    </div>











@endsection
