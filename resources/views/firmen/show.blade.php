@extends('layouts.app')
@section('content')
    <div class="container">

        <div class="row">
            <div class=".col-sm-4">
                <a href="{{url()->previous()}}" class="btn btn-info"> zurück</a>
            </div>
            <div class=".col-sm-4">
                <a href="{{route('firmen.edit',$firmen)}}" class="btn btn-warning"> Firma bearbeiten</a>
            </div>
            <div class=".col-sm-4">
                {{Form::open(array('route' => array('firmen.destroy',$firmen),'method' => 'DELETE' ) )}}
                {{ Form::submit('Firma löschen', array('class' => 'btn btn-danger')) }}
                {{ Form::close() }}
            </div>
        </div>

        <h2>{{ $firmen}}</h2>

        <h2>Ansprechpartnerliste</h2>

        <div class="table-responsive">
            <table class="table table-hover table-striped">
                <tr>


                </tr>
                <tr>

                </tr>
            </table>
        </div>
        <h2>Praktikantenliste</h2>
    </div>
@endsection
