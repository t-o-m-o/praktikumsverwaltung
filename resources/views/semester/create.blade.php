@extends('layouts.app')

@section('content')

    <div class="form-group">
        {{Form::open(array('route' => array('semester.store') ) )}}
        <div class="mb-3">

            <div class="mb-3">
                <label for="bezeichnung">Bezeichnung</label>

                <div class="input-group">
                    <input type="text" class="form-control" name="bezeichnung" id="bezeichnung" value="{{old('bezeichnung')}}">
                </div>
            </div>

            <hr class="mb-4">

            <button class="btn btn-primary btn-lg btn-block" type="submit" value="store">Semester hinzufügen</button>

            {{ Form::close() }}
        </div>
    </div>
@endsection
