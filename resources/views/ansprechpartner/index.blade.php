@extends('layouts.app')
@section('content')
  <div class="container">

      <div class="row">
          <div class=".col-sm-4"><a href="{{url()->previous()}}" class="btn btn-info"> zurück</a></div>
          <div class=".col-sm-4"><a href="{{route('ansprechpartner.create')}}" class="btn btn-info">Ansprechpartner hinzufügen</a></div>
          <div class=".col-sm-4"><a href="{{route('ansprechpartner.create')}}" class="btn btn-info">Ansprechpartner hinzufügen</a></div>
      </div>
      <ul class="pager">{{$ansprechpartner->links() }}</ul>
      <hr class="mb-4">
      <div class="table-responsive">
          <table class="table table-hover table-striped">
              <tr>
                  <th>ID</th>
                  <th>Vorname</th>
                  <th>Name</th>
                  <th>Telefon</th>
                  <th>Email</th>
                  <th>Firma</th>
                  <th>Berufsziel</th>
              </tr>
              @foreach($ansprechpartner as $ansprechpartnerdatensatz)
                  <tr>
                      <td><a href="{{route('ansprechpartner.show',$ansprechpartnerdatensatz)}}"> {{$ansprechpartnerdatensatz->Ansprechpartner_ID}}</a></td>
                      <td><a href="{{route('ansprechpartner.show',$ansprechpartnerdatensatz)}}"> {{$ansprechpartnerdatensatz->Vorname}}</a></td>
                      <td><a href="{{route('ansprechpartner.show',$ansprechpartnerdatensatz)}}"> {{$ansprechpartnerdatensatz->Nachname}}</a></td>
                      <td><a href="{{route('ansprechpartner.show',$ansprechpartnerdatensatz)}}"> {{$ansprechpartnerdatensatz->Telefon}}</a></td>
                      <td><a href="{{route('ansprechpartner.show',$ansprechpartnerdatensatz)}}"> {{$ansprechpartnerdatensatz->EMail}}</a></td>
                  </tr>
              @endforeach
          </table>
      </div>
  </div>
@endsection
