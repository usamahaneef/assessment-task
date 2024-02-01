<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use App\Models\Vote;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
     public function create()
    {
        return view('web.feedback.create',[
            'title' => 'Feedback',
            'categories' => Feedback::$category,
        ]);
    }

     public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'category' => 'required',
        ]);
        $feedback = new Feedback();
        $feedback->user_id = loggedInUser()->id;
        $feedback->title = $request->title;
        $feedback->description = $request->description;
        $feedback->category = $request->category;
        $feedback->save();

        return redirect()->route('web.home')->with('success', 'feedback created successfully');
    }

    public function detail(Feedback $feedback)
    {
        return view('web.feedback.detail', [
            'title' => 'feedback',
            'feedback' => $feedback,
        ]);
    }
     
}
