@extends('layouts.app')

@section('content')
    <div class="container">

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
    </div>
@endsection
