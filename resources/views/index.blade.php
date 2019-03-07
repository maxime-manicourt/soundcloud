@extends('layouts.app')

@section('content')
    <div class="last-tracks">
        <h2>Les derniers titres</h2>
    </div>
    <ul>
        @foreach($chansons as $c)
        <li>
        <a class="track" data-file='{{$c -> fichier}}' href="#">{{$c-> nom}}</a> appartient à.. {{$c -> utilisateur -> name}}.
        </li>
        @endforeach
    </ul>

@endsection