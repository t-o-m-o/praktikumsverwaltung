@extends('layouts.app')

@section('content')
    <div class="container">

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
