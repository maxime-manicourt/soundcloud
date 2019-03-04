@extends('layouts.app')

@section('content')
    {{$utilisateur->name}}
    @include('_chansons', ['chansons'=> $utilisateur->chansons])
@endsection