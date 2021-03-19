@section('title', 'Home')
@extends('layouts.app')

@section('content')

    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Titolo</th>
                <th scope="col">Regista</th>
                <th scope="col">Anno</th>
                <th scope="col">Trama</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($movies as $movie)
            <tr>
                <th scope="row">{{$movie->id}}</th>
                <td>{{$movie->titolo}}</td>
                <td>{{$movie->regista}}</td>
                <td>{{$movie->anno}}</td>
                <td><a href="{{route('movies.show',['movie' => $movie->id])}}">Vai alla trama</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection