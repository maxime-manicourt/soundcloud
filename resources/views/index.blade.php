@extends('layouts.app')

@section('content')
    <ul>
        @foreach($chansons as $c)
        <li>
        <a class="track" data-file='{{$c -> fichier}}' href="#">{{$c-> nom}}</a> appartient à.. {{$c -> utilisateur -> name}}.
        </li>
        @endforeach
    </ul>

@endsection