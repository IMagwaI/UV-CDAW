<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Favori;
use App\Models\Historique;
use Facade\FlareClient\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    //get all comments
    public function getComments()
    {
        $comments = Comment::all();
        return response()->json($comments);
    }
    //save comment
    public function saveComment(Request $request, $id_user, $id_media)
    {
        if ($request->ajax()) {
            $comment = new Comment();
            $comment->user_id = $id_user;
            $comment->media_id = $id_media;
            $comment->text = $request->msg;
            $comment->etat_moderation = 0;
            $comment->save();
            $comments = Comment::all();
            return view('commentaire', ['comments' => $comments]);
        }
    }

    public function paginate(Request $request, $id_film)
    {
        if($request->ajax())
        {
            $comments = Comment::where('media_id', $id_film)->orderBy('created_at', 'desc')->paginate(4);
            return view('commentaire', ["comments" => $comments])->render();
        }

    }

    //update comment
    public function updateComment(Request $request,$id_comment,$media_id)
    {

        $isSeen = false;
        if (Historique::where(['media_id' => $media_id, 'user_id' => auth()->user()->id])->exists()) {
            $isSeen = true;
        }
        $isLiked = false;
        if (Favori::where(['media_id' => $media_id, 'user_id' => auth()->user()->id])->exists()) {
            $isLiked = true;
        }
        $movie = DB::table('medias')->where('id', $media_id)->first();
        $category = DB::table('categories')->where('id', $movie->category_id)->first();  
        $comment = Comment::find($id_comment);
        if(auth()->user()->role == 'admin'){
            $comment->etat_moderation = 1;
        }      
        $comment->text = $request->text;
        $comment->save();
        $comments = Comment::where('media_id', $media_id)->orderBy('created_at', 'desc')->paginate(4);
        return view('movie-details', ['movie' => $movie, 'category' => $category, 'comments' => $comments, 'isLiked' => $isLiked, 'isSeen' => $isSeen]);

    }

        
/*             $comment = Comment::find($id_comment);
            $comment->etat_moderation = 1;
            $comment->save();
            $comments = Comment::all();
            return view('commentaire', ['comments' => $comments]);
        
    }
 */
  /*   public function gotoUpdate($id_comment,$id_media){
        $comment = Comment::find($id_comment);
        $comment_user = $comment->user;
        dd($comment_user);
        $comment->etat_moderation = 1;
        $comment->save();
        $comments = Comment::where('media_id', $id_media)->orderBy('created_at', 'desc')->paginate(4);
        return view('commentaire', ["comments" => $comments])->render();
    } */

    //delete comment
    public function deleteComment($id_comment,$id_film)
    {
        $isSeen = false;
        if (Historique::where(['media_id' => $id_film, 'user_id' => auth()->user()->id])->exists()) {
            $isSeen = true;
        }
        $isLiked = false;
        if (Favori::where(['media_id' => $id_film, 'user_id' => auth()->user()->id])->exists()) {
            $isLiked = true;
        }
            $movie = DB::table('medias')->where('id', $id_film)->first();
            $category = DB::table('categories')->where('id', $movie->category_id)->first();  
            $comment = Comment::find($id_comment);
            $comment->delete();     
            $newcomments = Comment::where('media_id', $id_film)->orderBy('created_at', 'desc')->paginate(4);
            return view('movie-details', ['movie' => $movie, 'category' => $category, 'comments' => $newcomments, 'isLiked' => $isLiked, 'isSeen' => $isSeen]);
        
    }
}
