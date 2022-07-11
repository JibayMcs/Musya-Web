<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use Illuminate\Http\Request;

class ArtistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recentlyAdded = Artist::orderBy('created_at', 'desc')->take(10)->get();
        $artists = Artist::all();

        return view('artist.index', compact('recentlyAdded', 'artists'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $artist = Artist::find($id);
        return view('artist.single', compact('artist'));
    }
}
