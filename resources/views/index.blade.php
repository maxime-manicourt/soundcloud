@extends('layouts.app')

@section('content')
    
    Ceci est un index

    <ul>
        @foreach ($chanson as $c)
            <li><a class="chanson" data-file="{{$c ->fichier}}" href="#">{{$c -> nom}}</a> par {{$c -> utilisateur -> name}}</li>
        @endforeach
    </ul>

@endsection