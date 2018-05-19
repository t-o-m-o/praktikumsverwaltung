@extends('layouts.app')

@section('content')
    <div class="container">
        <?php

        use App\Http\Controllers\FirmenController;
        use App\Http\Controllers\TeilnehmerController;
        use App\Http\Controllers\PraktikazeitraeumeController;

        $firmen = FirmenController::asArray();
        $teilnehmerliste = TeilnehmerController::asArray();
        $zeitraueme = PraktikazeitraeumeController::asArray();

        ?>
        <div class="form-group">
            {{Form::open(array('route' => array('praktika.store') ) )}}
            <div class="mb-3">


                <label for="teilnehmer">Teilnehmer</label>

                <div class="input-group">
                    <select name="teilnehmer" class="form-control">
                        <option value="">"Bitte Teilnehmer auswählen"</option>
                        @foreach ($teilnehmerliste as $teilnehmer)
                        <option
                                @if ($teilnehmer->Teilnehmer_ID == old('teilnehmer'))
                                selected
                                @endif
                                value="{{$teilnehmer->Teilnehmer_ID}}">
                                {{$teilnehmer->Nachname}} &nbsp;&nbsp;&nbsp;
                                {{$teilnehmer->Vorname}}
                        </option>
                        @endforeach
                    </select>
                </div>

            </div>
            <div class="mb-3">

                <label for="firma">Firma</label>

                <div class="input-group">

                    <select name="firma" class="form-control">
                        <option value="">"Bitte Firma auswählen"</option>
                        @foreach ($firmen as $firma)
                        <option
                                @if ($firma->Firmen_ID == old('firma'))
                                selected
                                @endif
                                value="{{$firma->Firmen_ID}}">
                            {{$firma->Firmenname}}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="mb-3">
                <label for="zeit">Zeit</label>

                <div class="input-group">
                    <select name="zeit" class="form-control">
                        <option value="">"Bitte Zeitraum auswählen"</option>
                        @foreach ($zeitraueme as $zeitraum)
                        <option
                                @if ($zeitraum->Praktikumszeit_ID == old('zeit'))
                                selected
                                @endif
                                value="{{$zeitraum->Praktikumszeit_ID}}">{{$zeitraum->Start}}
                            bis {{$zeitraum->Ende}}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="mb-3">
                <label for="status">Status</label>

                <div class="input-group">
                    <input type="text" class="form-control" name="status" id="status" value="{{old('status')}}">
                </div>
            </div>

            <hr class="mb-4">

            <button class="btn btn-primary btn-lg btn-block" type="submit" value="store">Praktikum hinzufügen</button>

            {{ Form::close() }}
        </div>
    </div>
@endsection
