@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <h3 class="text-center">Praktikum </h3>

        <div class="text-center">{{ $praktika->teilnehmer->Vorname }}, {{ $praktika->teilnehmer->Nachname }}</div>

        <div class="btn-group">
            <div class="ml-1">
                <a href="{{route('welcome')}}" class="btn btn-info"> Übersicht</a>
            </div>
            <div class="ml-1">
                <a href="{{route('praktika.index')}}" class="btn btn-info">
                    Praktikaliste</a>
            </div>

            <div class="ml-1">
                <a href="{{route('praktika.edit',$praktika)}}" class="btn btn-warning"> Praktikum bearbeiten</a>
            </div>
            <div class="ml-1">
                {{Form::open(array('route' => array('praktika.destroy',$praktika),'method' => 'DELETE' ) )}}
                {{ Form::submit('Praktikum löschen', array('class' => 'btn btn-danger')) }}
                {{ Form::close() }}
            </div>
        </div>
    </div>
    <hr class="mb-4">
    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <tr>
                <th>ID</th>
                <th>Firmenname</th>
                <th>Status</th>
                <th>Teilnehmer</th>
                <th>Start</th>
                <th>Ende</th>
            </tr>
            <tr>
                <td> {{ $praktika->Praktikum_ID}} </td>
                <td>
                    <a href="{{route('firmen.show',$praktika->firmen)}}">
                        {{ $praktika->firmen->Firmenname}}
                    </a>
                </td>
                <td>{{ $praktika->Status}}</td>
                <td>
                    <a href="{{route('teilnehmer.show',$praktika->teilnehmer)}}">
                        {{ $praktika->teilnehmer->Nachname}}
                    </a>
                </td>
                <td>
                    <a href="{{route('praktikazeitraeume.show',$praktika->praktikazeitraeume)}}">
                        {{ $praktika->praktikazeitraeume->Start}}
                    </a>
                </td>
                <td>
                    <a href="{{route('praktikazeitraeume.show',$praktika->praktikazeitraeume)}}">
                        {{ $praktika->praktikazeitraeume->Ende}}
                    </a>
                </td>
            </tr>
        </table>
    </div>
    <hr class="mb-4">
    <?php $kontakte = $praktika->kontaktliste?>
    <h3 class="text-center">Kontakte </h3>
    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <tr>
                <th>Kontaktbeschreibung</th>
                <th>Datum</th>
            </tr>
            @foreach($kontakte as $kontakt)
                <tr>
                    <td>
                        <a href="{{route('kontaktliste.show',$kontakt)}}">
                            {{$kontakt->Kontaktbeschreibung}}
                        </a>
                    </td>
                    <td>
                        <a href="{{route('kontaktliste.show',$kontakt)}}">
                            {{$kontakt->Datum}}
                        </a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
