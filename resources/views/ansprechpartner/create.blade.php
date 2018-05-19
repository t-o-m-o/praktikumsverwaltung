@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="form-group">
            {{Form::open(array('route' => array('ansprechpartner.store') ) )}}
            <div class="mb-3">
                <label for="status">Name</label>

                <div class="input-group">
                    <input type="text" class="form-control" name="name" id="name" value="{{old('name')}}">
                </div>
            </div>

            <div class="mb-3">
                <label for="vorname">Vorname</label>

                <div class="input-group">
                    <input type="text" class="form-control" name="vorname" id="vorname"
                           value="{{old('vorname')}}">
                </div>
            </div>

            <div class="mb-3">
                <label for="status">Name</label>

                <div class="input-group">
                    <input type="text" class="form-control" name="name" id="name"
                           value="{{old('name')}}">
                </div>
            </div>

            <div class="mb-3">
                <label for="telefon">Telefon</label>

                <div class="input-group">
                    <input type="text" class="form-control" name="telefon" id="telefon"
                           value="{{old('telefon')}}">
                </div>
            </div>
            <div class="mb-3">
                <label for="email">E-Mail</label>

                <div class="input-group">
                    <input type="text" class="form-control" name="email" id="email"
                           value="{{old('email')}}">
                </div>
            </div>

            <hr class="mb-4">

            <button class="btn btn-primary btn-lg btn-block" type="submit" value="store">Ansprechpartner hinzufügen
            </button>

            {{ Form::close() }}
        </div>

    </div>
@endsection
