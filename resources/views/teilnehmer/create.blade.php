@extends('layouts.app')

@section('content')
    <div class="container">
        <?php


        use App\Http\Controllers\TeilnehmerController;
        use App\Http\Controllers\BerufszielController;
        use App\Http\Controllers\SemesterController;


        $zielliste = BerufszielController::asArray();
        $semesterl = SemesterController::asArray();


        ?>

        <div class="form-group">
            {{Form::open(array('route' => array('teilnehmer.store') ) )}}

            <div class="mb-3">
                <label for="ziel">Berufsziel</label>

                <div class="input-group">

                    <select name="ziel" class="form-control">
                        <option value=" ">Bitte Berufsziel auswählen</option>
                        @foreach ($zielliste as $bziel)
                        <option
                                @if ($bziel->Berufsziel_ID == old('ziel'))
                                    selected
                                @endif
                                value="{{$bziel->Berufsziel_ID}}">
                            {{$bziel->Berufszielbezeichnung}}

                        </option>

                        @endforeach
                    </select>
                </div>

            </div>

            <div class="mb-3">

                <label for="semester">Semester</label>

                <div class="input-group">

                    <select name="semester" class="form-control">
                        <option value=" ">Bitte Semester auswählen</option>
                        @foreach ($semesterl as $semestere)
                        <option
                                @if ($semestere->Semester_ID == old('semester'))
                                    selected
                                @endif
                                value="{{$semestere->Semester_ID}}">
                            {{$semestere->Semesterbezeichnung}}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>

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


