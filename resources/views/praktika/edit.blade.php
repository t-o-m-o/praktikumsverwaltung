@extends('layouts.app')
@section('content')

<?php
  use App\Http\Controllers\FirmenController;
use App\Http\Controllers\TeilnehmerController;
use App\Http\Controllers\PraktikazeitraeumeController;

$firmen = FirmenController::asArray();
  $teilnehmerliste = TeilnehmerController::asArray();
  $zeitraueme = PraktikazeitraeumeController::asArray();

?>
    <div class="container">

        <ul class="pager">
            <div class=".col-md-4"><a href="{{url()->previous()}}"> zurück</a></div>

        </ul>







        <div class="form-group">
            {{Form::open(array('route' => array('praktika.update',$praktikum->Praktikum_ID) ) )}}
            <div class="mb-3">
            <label for="firma">Firma</label>
            <div class="input-group">
                <select name="firma" class="form-control">
                    <option value="">"Bitte Firma auswählen"</option>
                    @foreach ($firmen as $firma)
                    <option
                            @if ($firma->Firmen_ID == $praktikum->Firmen_ID)
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
            <label for="teilnehmer">Teilnehmer</label>
            <div class="input-group">
                <select name="teilnehmer" class="form-control">
                    <option value="">"Bitte Teilnehmer auswählen"</option>
                    @foreach ($teilnehmerliste as $teilnehmer)
                    <option
                            @if ($teilnehmer->Teilnehmer_ID == $praktikum->Teilnehmer_ID)
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
                    <input type="text" class="form-control" name="status" id="status" value="{{$praktikum->Status}}">
                </div>
            </div>

            <hr class="mb-4">

            <button class="btn btn-primary btn-lg btn-block" type="submit" value="store">Praktikum hinzufügen</button>

            </div>



            {{ Form::close() }}

            </div>











@endsection
