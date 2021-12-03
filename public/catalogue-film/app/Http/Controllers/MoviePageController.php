<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Comment;


class MoviePageController extends Controller
{
    public function index()
    {
        $movies = DB::table('medias')->get();
        return view('movie-detail', ['movies' => $movies]);
    }
    public function show($id)
    {
        $movie = DB::table('medias')->where('id', $id)->first();
        $comments = Comment::where('media_id', $id)->orderBy('created_at', 'desc')->paginate(4);
        //category khass tbdel mazal makatsupportich multiple
        $category = DB::table('categories')->where('id', $movie->category_id)->first();  
        return view('movie-details', ['movie' => $movie, 'category' => $category, 'comments' => $comments]);
    }
    
}
