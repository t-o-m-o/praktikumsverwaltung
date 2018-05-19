@extends('layouts.app')

@section('content')
    <div class="container">
        <?php

        use App\Http\Controllers\BerufszielController;
        use App\Http\Controllers\SemesterController;

        $berufsziele = BerufszielController::asArray();
        $semesterliste = SemesterController::asArray();

        ?>
        <div class="form-group">
            {{Form::open(array('route' => array('teilnehmer.store') ) )}}

            <div class="mb-3">
                <label for="vorname">Vorname</label>

                <div class="input-group">
                    <input type="text" class="form-control" name="vorname" id="vorname" value="{{old('vorname')}}">
                </div>
            </div>

            <div class="mb-3">
                <label for="nachname">Nachname</label>

                <div class="input-group">
                    <input type="text" class="form-control" name="nachname" id="nachname" value="{{old('nachname')}}">
                </div>
            </div>

            <div class="mb-3">


                <label for="berufsziel">Berufsziel</label>

                <div class="input-group">
                    <select name="berufsziel" class="form-control">
                        <option value="">"Bitte Berufsziel auswählen"</option>
                        @foreach ($berufsziele as $berufsziel)
                            <option
                                    @if ($berufsziel->Berufsziel_ID == old('berufsziel'))
                                    selected
                                    @endif
                                    value="{{$berufsziel->Berufsziel_ID}}">
                                {{$berufsziel->Berufszielbezeichnung}}
                            </option>
                        @endforeach
                    </select>
                </div>

            </div>
            <div class="mb-3">

                <label for="semester">Semester</label>

                <div class="input-group">

                    <select name="semester" class="form-control">
                        <option value="">"Bitte Semester auswählen"</option>
                        @foreach ($semesterliste as $semester)
                            <option
                                    @if ($semester->Semester_ID == old('semester'))
                                    selected
                                    @endif
                                    value="{{$semester->Semester_ID}}">
                                {{$semester->Semesterbezeichnung}}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <hr class="mb-4">

            <button class="btn btn-primary btn-lg btn-block" type="submit" value="store">Teilnehmer hinzufügen</button>

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
