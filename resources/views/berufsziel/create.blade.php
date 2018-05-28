@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h3 class="text-center">Berufsziel hinzufügen</h3>

        <div class="btn-group">
            <div class="ml-1"><a href="{{route('welcome')}}" class="btn btn-info"> Übersicht</a></div>
            <div class="ml-1"><a href="{{route('berufsziel.index')}}" class="btn btn-info">
                    Berufszielliste</a></div>
        </div>
    </div>
    <hr class="mb-4">


    <div class="form-group">
        {{Form::open(array('route' => array('berufsziel.store') ) )}}

        <div class="mb-3">
            <label for="status">Berufszielbezeichnung</label>

            <div class="input-group">
                <input type="text" class="form-control" name="bezeichnung" id="bezeichnung"
                       value="{{old('bezeichnung')}}">
            </div>
        </div>

        <hr class="mb-4">

        <button class="btn btn-primary btn-lg btn-block" type="submit" value="store">Berufsziel hinzufügen</button>

        {{ Form::close() }}
    </div>

@endsection
