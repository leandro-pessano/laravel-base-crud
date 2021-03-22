<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'movies' => Movie::all()
        ];
        return view('movies.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('movies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $request->validate([
            'titolo' => 'required|unique:movies|max:255',
            'regista' => 'required|max:255',
            'anno' => 'required|numeric|digits:4',
            'trama' => 'required'
        ]);

        $newMovie = new Movie();

        $newMovie->fill($data);

        $newMovie->save();

        // return redirect()->route('movies.show', $newMovie->find($newMovie->id));
        return redirect()->route('movies.index')->with('status', 'Film aggiunto');;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Movie::find($id)) {
            $data = [
                'movie' => Movie::find($id)
            ];
            return view('movies.show', $data);
        }
        
        abort('404');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Movie $movie)
    {
        if ($movie) {
            $data = [
                'movie' => $movie
            ];
            return view('movies.edit', $data);
        }
        
        abort('404');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movie $movie)
    {
        $data = $request->all();

        $request->validate([
            'titolo' => 'required|max:255',
            'regista' => 'required|max:255',
            'anno' => 'required|numeric|digits:4',
            'trama' => 'required'
        ]);

        $movie->update($data);

        return redirect()->route('movies.show', $movie);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $movie)
    {
        $movie->delete();

        return redirect()->route('movies.index')->with('status', 'Film eliminato');
    }
}
