<?php

namespace App\Http\Controllers;

use App\Http\Requests\MovieTagRequest;
use App\Http\Resources\MovieTagResource;
use App\Models\MovieTag;
use Illuminate\Http\Request;

class MovieTagController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
    $sort = $request->has('sort') ? $request->sort : 'asc';

    return MovieTagResource::collection( MovieTag::orderBy('name', $sort)->get() );
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(MovieTagRequest $request)
  {
    return new MovieTagResource( MovieTag::create( $request->all() ) );
  }
}
