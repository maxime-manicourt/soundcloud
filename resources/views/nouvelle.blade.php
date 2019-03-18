@extends('layouts.app')

@section('content')

@include('_error')

<form action="/creer" method="post" enctype="multipart/form-data" data-pjax>
    <input type="text" name="nom" required placeholder="Nom du son" value="{{old('nom')}}"><br>
    <input type="text" name="style" required placeholder="Style du son" value="{{old('style')}}"><br>
    <input type="file" name="chanson" required><br>
    {{csrf_field()}}
    <input type="submit" value="Envoyer">
</form>
</div>

@endsection