@section('title', 'Home')
@extends('layouts.app')

@section('content')

<div class="container">
    <form action="{{route('movies.store')}}" method="post">
    @method('POST')
    @csrf
        <div class="form-group">
            <label for="titolo">Titolo</label>
            <input type="text" class="form-control" name="titolo" id="titolo">
        </div>
        <div class="form-group">
            <label for="regista">Regista</label>
            <input type="text" class="form-control" name="regista" id="regista">
        </div>
        <div class="form-group">
            <label for="anno">Anno</label>
            <input type="text" class="form-control" name="anno" id="anno">
        </div>
        <div class="form-group">
            <label for="trama">Trama</label>
            <textarea class="form-control" name="trama" id="trama" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Inserisci</button>
    </form>
</div>

@endsection