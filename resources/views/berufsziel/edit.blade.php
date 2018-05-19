@extends('layouts.app')
@section('content')

    <div class="container">

        <div class="row">
            <div class=".col-sm-4"><a href="{{url()->previous()}}" class="btn btn-info"> zurück</a></div>
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
    </div>
@endsection
