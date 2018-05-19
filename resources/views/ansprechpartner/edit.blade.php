@extends('layouts.app')
@section('content')

    <div class="container">

        <div class="row">
            <div class=".col-sm-4"><a href="{{url()->previous()}}" class="btn btn-info"> zurück</a></div>
        </div>
        <hr class="mb-4">
        <div class="form-group">
            {{Form::open(array('route' => array('ansprechpartner.update',$ansprechpartner),'method' => 'PUT' ) )}}

            <div class="mb-3">
                <label for="vorname">Vorname</label>

                <div class="input-group">
                    <input type="text" class="form-control" name="vorname" id="vorname"
                           value="{{$ansprechpartner->Vorname}}">
                </div>
            </div>

            <div class="mb-3">
                <label for="status">Name</label>

                <div class="input-group">
                    <input type="text" class="form-control" name="name" id="name"
                           value="{{$ansprechpartner->Nachname}}">
                </div>
            </div>

            <div class="mb-3">
                <label for="telefon">Telefon</label>

                <div class="input-group">
                    <input type="text" class="form-control" name="telefon" id="telefon"
                           value="{{$ansprechpartner->Telefon}}">
                </div>
            </div>
            <div class="mb-3">
                <label for="email">E-Mail</label>

                <div class="input-group">
                    <input type="text" class="form-control" name="email" id="email"
                           value="{{$ansprechpartner->Email}}">
                </div>
            </div>


            <hr class="mb-4">
            <button class="btn btn-primary btn-lg btn-block" type="submit" value="store">Ansprechpartner bearbeiten
            </button>
        </div>


        {{ Form::close() }}

    </div>











@endsection
