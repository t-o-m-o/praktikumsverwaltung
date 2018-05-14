@extends('layouts.app')
@section('content')

<body>
<a href="{{url()->previous()}}"> zurück</a>
<table>
@foreach($semester as $teilnehmer)
    <tr>
        <td>{{$teilnehmer}}</td>
    </tr>
@endforeach
</table>
@endsection