@extends('layouts.app')

@section('content')
<div id="main">
<form action="/creer" method="post" enctype="multipart/form-data">
    <input type="text" name="nom" required placeholder="Nom du son"><br>
    <input type="text" name="style" required placeholder="Style du son"><br>
    <input type="file" name="chanson" required><br>
    {{csrf_field()}}
    <input type="submit" value="Envoyer">
</form>
</div>
@endsection