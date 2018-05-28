@extends('layouts.app')
@section('content')


    <div class="container-fluid">
        <h3 class="text-center">Berufsziel bearbeiten</h3>

        <div class="btn-group">
            <div class="ml-1"><a href="{{route('welcome')}}" class="btn btn-info"> Übersicht</a></div>
            <div class="ml-1"><a href="{{route('berufsziel.index')}}" class="btn btn-info">
                    Berufszielliste</a></div>
            <div class="ml-1"><a href="{{route('berufsziel.create')}}" class="btn btn-info"> Berufsziel
                    hinzufügen</a></div>
        </div>
    <hr class="mb-4">
    <div class="form-group">
        {{Form::open(array('route' => array('berufsziel.update',$berufsziel),'method' => 'PUT' ) )}}

        <div class="form-group">
            {{Form::open(array('route' => array('berufsziel.store') ) )}}

            <div class="mb-3">
                <label for="status">Berufszielbezeichnung</label>

                <div class="input-group">
                    <input type="text" class="form-control" name="bezeichnung" id="bezeichnung"
                           value="{{$berufsziel->Berufszielbezeichnung}}">
                </div>
            </div>

            <hr class="mb-4">

            <button class="btn btn-primary btn-lg btn-block" type="submit" value="store">Berufsziel bearbeiten
            </button>


            <hr class="mb-4">
        </div>


        {{ Form::close() }}
    </div>
@endsection
