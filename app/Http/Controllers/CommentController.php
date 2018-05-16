<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\comments;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function newComment(Request $request)
    {
        $this->validate($request, [
            'Message' => 'required'
        ]);

        $comment = new comments;


        $comment->postid = $request->input('id');
        $comment->username = $request->input('user');
        $comment->comcontent = $request->input('Message');

        $comment->save();

        return back();
        }
}
