@section('title', 'Home')
@extends('layouts.app')

@section('content')

    @if (session('status'))
        <div class="alert alert-success">
            {{session('status')}}
        </div>
    @endif

    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Titolo</th>
                <th scope="col">Regista</th>
                <th scope="col">Anno</th>
                <th scope="col">Trama</th>
                <th scope="col">Operazioni</th>
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
                <td>
                    <a href="{{route('movies.edit',['movie' => $movie->id])}}" class="btn btn-info">Modifica</a>
                    <form class="d-inline-block" action="{{route('movies.destroy', $movie->id)}}" method="post">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger">Elimina</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection