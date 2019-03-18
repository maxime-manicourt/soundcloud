@extends('layouts.app')

@section('content')
    {{$utilisateur->name}}
    <br/>
    @auth
        @if($utilisateur->id != \Illuminate\Support\Facades\Auth::id())
            @if(Auth::user()->jeLesSuis->contains($utilisateur->id))
                <a href="/suivi/{{ $utilisateur->id }}" data-pjax-toggle>Arrêter de suivre</a>
            @else 
                <a href="/suivi/{{ $utilisateur->id }}" data-pjax-toggle>Suivre</a>
            @endif
        @endif
    @endauth
    <br/>
    <br/>
    Cet utilisateur suit {{ $utilisateur->jeLesSuis->count() }} personne(s).
    <br/>
    Cet utilisateur est suivi par {{ $utilisateur->ilsMeSuivent->count() }} personne(s).

    @include('_chansons', ['chansons'=> $utilisateur->chansons]) {{--  --}}

@endsection