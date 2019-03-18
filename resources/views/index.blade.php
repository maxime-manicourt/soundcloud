@extends('layouts.app')

@section('content')
<div class="banner">
    
</div>
<div class="container">
<div id="main">
    <div class="last-tracks">
        <h2>Les derniers titres</h2>
    </div>
    <ul>
        @foreach($chansons as $c)
        <li>
        <a class="track" data-file='{{$c -> fichier}}' href="#">{{$c-> nom}}</a> appartient à.. <a href={{ route('utilisateur', ['id' => $c->utilisateur->id]) }}>{{ $c->utilisateur->name }}.</a>
        </li>
        @endforeach
    </ul>
</div>
</div>
@endsection