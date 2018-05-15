@extends('layouts.app')
@section('content')
    <div class="container">

        <ul class="pager">
            <div class=".col-md-4"><a href="{{url()->previous()}}"> zurück</a></div>

        </ul>









        <div class="form-group">
            {{Form::open(array('route' => array('praktika.update') ) )}}
            <div class="mb-3">
                <label for="status">Status</label>

                <div class="input-group">
                    <input type="text" class="form-control" name="status" id="status" value="{{old('status')}}">
                </div>
            </div>

            </div>

            {{ Form::close() }}





























        <div class="table-responsive">
            <table class="table table-hover table-striped">
                <tr>
                    <td>ID</td>
                    <td>Firmenname</td>
                    <td>Status</td>
                    <td>Teilnehmer</td>
                    <td>Start</td>
                    <td>Ende</td>
                </tr>
                <tr>
                    <td>{{ $praktikum->Praktikum_ID}}</td>
                    <td>{{ $praktikum->firmen->Firmenname}}</td>
                    <td>{{ $praktikum->Status}}</td>
                    <td>{{ $praktikum->teilnehmer->Nachname }}</td>
                    <td>{{ $praktikum->praktikazeitraeume->Start}}</td>
                    <td>{{ $praktikum->praktikazeitraeume->Ende}}</td>
                </tr>
            </table>
        </div>
    </div>
@endsection
