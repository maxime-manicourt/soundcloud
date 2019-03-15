@extends('layouts.app')

@section('content')

    <h3>Utilisateurs</h3>
    @foreach($utilisateurs as $u)
        <a href="/utilisateur/{{$u -> id}}">{{$u -> name}}</a><br>
    @endforeach

    <h3>Chansons</h3>
    @include("_chansons", ['chansons' => $chansons])

 @endsection