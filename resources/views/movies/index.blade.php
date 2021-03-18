@section('title', 'Home')
@extends('layouts.app')

@section('content')
    @foreach ($movies as $movie)
    <ul>
        <li>Titolo: {{$movie->titolo}} </li>
        <li>Regista: {{$movie->regista}} </li>
        <li>Anno: {{$movie->anno}} </li>
        <a href="{{route('movies.show',['movie' => $movie->id])}}">Vai alla trama</a>
    </ul>
    @endforeach
@endsection