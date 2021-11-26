<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MoviePageController extends Controller
{
    public function index()
    {
        $movies = DB::table('films')->get();
        return view('movie-detail', ['movies' => $movies]);
    }
    public function show($id)
    {
        $movie = DB::table('films')->where('id', $id)->first();
        $category = DB::table('categories')->where('id', $movie->category_id)->first();
        return view('movie-details', ['movie' => $movie, 'category' => $category]);
}
}