<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Playlist;

class PlaylistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $playlists = Playlist::where('user_id', auth()->user()->id)->get();

        return view("playlists", ["playlists" => $playlists]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $categories = Category::all();
        // return view('addFilm', ['categories' => $categories]);
        return view("addPlaylist");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->input('name');

        $data = ['name' => $name, 'user_id' => auth()->user()->id];
        Playlist::create($data);
        return redirect('/playlists');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $categories = Category::all();
        // $film = Media::where('id', $id)->get()[0];
        // return view("updateFilm", ["film" => $film, "categories" => $categories]);
        // echo $film;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Media::where('id', $id)->update(
        //     [
        //         'name' => $request->input('name'),
        //         'director' => $request->input('director'),
        //         'category_id' => $request->input('category')
        //     ]
        // );
        // return redirect('/addedFilms');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Media::destroy($id);
        // return redirect('/addedFilms');
    }
}
