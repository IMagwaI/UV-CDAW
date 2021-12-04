<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favori;
use App\Models\Media;

class FavoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $favoris = Favori::where('user_id', auth()->user()->id)->get();
        $media = collect([]);
        foreach ($favoris as $fav) {
            $media->push(Media::where('id', $fav->media_id)->get()[0]);
            // array_push($media, Media::where('id', $fav->media_id)->get());
        };
        // $media = collect($media);
        return view("favoris", ["favoris" => $media]);
        // echo $media;
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
        // return view("addPlaylist");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id)
    {

        $data = ['media_id' => $id, 'user_id' => auth()->user()->id];
        Favori::create($data);
        return redirect('/favoris');
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
        Favori::where(['media_id' => $id, 'user_id' => auth()->user()->id])->delete();
        return redirect('/favoris');
    }
}
