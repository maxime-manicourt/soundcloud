<ul class="tracks__list">
    @foreach($chansons as $c)
    <li class="tracks__list__items">
        <img class="tracks__list__cover" src="{{ URL::asset('/public/index.jpeg') }}" />
        <a class="track" data-file='{{$c -> fichier}}' href="#">{{$c-> nom}}</a> appartient à.. <a href={{ route('utilisateur', ['id' => $c->utilisateur->id]) }}>{{ $c->utilisateur->name }}.</a>
    </li>
    @endforeach
</ul>