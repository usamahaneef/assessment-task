<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Feedback;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function create(Feedback $feedback)
    {
        $feedback->loadMissing('user');
        return view('web.feedback.comment.create',[
            'title' => 'feedback',
            'feedback' => $feedback,
        ]);
    }

    public function store(Request $request , Feedback $feedback)
    {
        $request->validate([
            'content' => 'required',
        ]);

        $comment = new Comment();
        $comment->user_id =   auth('user')->user()->id;
        $comment->feedback_id =   $feedback->id;
        $comment->content =   $request->content;
        $comment->save();
        return redirect()->route('web.feedback.detail' ,$feedback)->with('success', 'Comment created');
    }
    
}
