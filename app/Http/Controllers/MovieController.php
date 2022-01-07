<?php

namespace App\Http\Controllers;

use App\Http\Requests\MovieStoreRequest;
use App\Http\Requests\MovieUpdateRequest;
use App\Http\Resources\MovieResource;
use App\Http\Resources\MovieStoreResource;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sort = $request->has('sort') ? $request->sort : 'asc';

        return MovieResource::collection( Movie::orderBy('name', $sort)->get() );

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MovieStoreRequest $request)
    {
        $movie = Movie::create([
            'name' => $request->name,
            'poster' => Storage::putFile('posters', $request->file('poster'), time() )
        ]);

        return new MovieResource( $movie );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Movie $movie)
    {
      return new MovieResource( $movie );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MovieUpdateRequest $request, Movie $movie)
    {
        $data  = $request->all();
        if( $request->hasFile('poster') ){
          Storage::delete( $movie->poster );
          $data['poster'] = Storage::putFile('posters', $request->file('poster'), time() );
        }

        $movie->fill($data);
        $movie->save();

        return new MovieResource( $movie );
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
    }
}
