@section('title', 'Edit')
@extends('layouts.app')

@section('content')

<div class="container">
    <h2>Inserisci film</h2>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{route('movies.update', $movie->id)}}" method="post">
    @method('PUT')
    @csrf
        <div class="form-group">
            <label for="titolo">Titolo</label>
            <input type="text" class="form-control" name="titolo" id="titolo" value="{{$movie->titolo}}">
        </div>
        <div class="form-group">
            <label for="regista">Regista</label>
            <input type="text" class="form-control" name="regista" id="regista" value="{{$movie->regista}}">
        </div>
        <div class="form-group">
            <label for="anno">Anno</label>
            <input type="text" class="form-control" name="anno" id="anno" value="{{$movie->anno}}">
        </div>
        <div class="form-group">
            <label for="trama">Trama</label>
            <textarea class="form-control" name="trama" id="trama" rows="3">{{$movie->trama}}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Inserisci</button>
    </form>
</div>

@endsection