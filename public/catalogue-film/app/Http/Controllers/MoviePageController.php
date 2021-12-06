<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Comment;
use App\Models\Favori;
use App\Models\Historique;
use App\Models\Playlist;


class MoviePageController extends Controller
{
    public function index()
    {
        $movies = DB::table('medias')->get();
        return view('movie-detail', ['movies' => $movies]);
    }
    public function show($id)
    {
        $isLiked = false;
        $isSeen = false;
        $playlistExists = false;
        if (auth()->check()) {
            if (Favori::where(['media_id' => $id, 'user_id' => auth()->user()->id])->exists()) {
                $isLiked = true;
            }
            if (Historique::where(['media_id' => $id, 'user_id' => auth()->user()->id])->exists()) {
                $isSeen = true;
            }
            if (Playlist::where(['user_id' => auth()->user()->id])->exists()) {
                $playlistExists = true;
            }
        }

        $movie = DB::table('medias')->where('id', $id)->first();
        $comments = Comment::where('media_id', $id)->orderBy('created_at', 'desc')->paginate(4);
        return view('movie-details', ['movie' => $movie, 'comments' => $comments, 'isLiked' => $isLiked, 'isSeen' => $isSeen, 'playlistExists' => $playlistExists]);
    }
}
