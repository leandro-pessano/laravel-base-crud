<h1>Lista film</h1>

    @foreach ($movies as $movie)
    <ul>
        <li>Titolo: {{$movie->titolo}} </li>
        <li>Regista: {{$movie->regista}} </li>
        <li>Anno: {{$movie->anno}} </li>
        <a href="{{route('movies.show',['movie' => $movie->id])}}">Vai alla trama</a>
    </ul>
    @endforeach
