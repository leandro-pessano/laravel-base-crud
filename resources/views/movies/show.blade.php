@section('title', 'Show')
@extends('layouts.app')

@section('content')
<h1>Trama {{$movie->titolo}}</h1>
<p>{{$movie->trama}}</p>
@endsection
