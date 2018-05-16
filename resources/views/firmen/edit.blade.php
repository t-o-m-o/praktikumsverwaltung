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

        <div class="row">
            <div class=".col-sm-4"><a href="{{url()->previous()}}" class="btn btn-info"> zurück</a></div>
        </div>
        <hr class="mb-4">
        <div class="form-group">
            {{Form::open(array('route' => array('praktika.update',$praktika),'method' => 'PUT' ) )}}
            <div class="mb-3">
                <label for="firma">Firma</label>

                <div class="input-group">
                    <select name="firma" class="form-control">
                        <option value="">"Bitte Firma auswählen"</option>
                        @foreach ($firmen as $firma)
                            <option
                                    @if ($firma->Firmen_ID == $praktika->Firmen_ID)
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
                                    @if ($teilnehmer->Teilnehmer_ID == $praktika->Teilnehmer_ID)
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
                                    @if ($zeitraum->Praktikumszeit_ID == $praktika->Praktikumszeit_ID))
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
                    <input type="text" class="form-control" name="status" id="status" value="{{$praktika->Status}}">
                </div>
            </div>

            <hr class="mb-4">

            <button class="btn btn-primary btn-lg btn-block" type="submit" value="store">Praktikum bearbeiten</button>

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
