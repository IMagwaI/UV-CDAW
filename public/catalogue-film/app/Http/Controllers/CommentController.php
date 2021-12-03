<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Facade\FlareClient\View;
use Illuminate\Http\Request;

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

    //delete comment
    public function deleteComment($id)
    {
        $comment = Comment::find($id);
        $comment->delete();
        return response()->json($comment);
    }
}
