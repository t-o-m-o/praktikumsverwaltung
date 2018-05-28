@extends('layouts.app')
@section('content')
@if (isset(Auth::user()->typ) && Auth::user()->typ=="admin")
    <div class="container-fluid">
        <h3 class="text-center">Benutzer</h3>

        <div class="btn-group">
            <div class="ml-1"><a href="{{route('welcome')}}" class="btn btn-info"> Übersicht</a></div>
        </div>
    </div>

    <hr class="mb-4">
    <div class="table-responsive">
        <ul class="pager">{{$users->links() }}</ul>
        <table class="table table-hover table-striped">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Typ</th>
            </tr>
            @foreach($users as $user)
                <tr>
                    <td>
                        <a href="{{route('user.edit',$user)}}"> {{$user->id}}</a>
                    </td>
                    <td>
                        <a href="{{route('user.edit',$user)}}"> {{$user->name}}</a>
                    </td>
                    <td>
                        <a href="{{route('user.edit',$user)}}"> {{$user->email}}</a>
                    </td>
                    <td>
                        <a href="{{route('user.edit',$user)}}"> {{$user->typ}}</a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endif
@endsection
