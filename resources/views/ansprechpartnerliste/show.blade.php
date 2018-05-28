@extends('layouts.app')
@section('content')



    <a href="{{url()->previous()}}"> zurück</a>
    {{$ansprechpartner}}
@endsection