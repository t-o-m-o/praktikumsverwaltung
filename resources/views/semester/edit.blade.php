@extends('layouts.app')
@section('content')


    <div class="container">

        <div class="row">
            <div class=".col-sm-4"><a href="{{url()->previous()}}" class="btn btn-info"> zurück</a></div>
        </div>
        <hr class="mb-4">
        <div class="form-group">
            {{Form::open(array('route' => array('semester.update',$semester),'method' => 'PUT' ) )}}






            <div class="mb-3">
                <label for="bezeichnung">Bezeichnung</label>

                <div class="input-group">
                    <input type="text" class="form-control" name="bezeichnung" id="bezeichnung" value="{{$semester->Semesterbezeichnung}}">
                </div>
            </div>

            <hr class="mb-4">

            <button class="btn btn-primary btn-lg btn-block" type="submit" value="store">Semester bearbeiten</button>

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
