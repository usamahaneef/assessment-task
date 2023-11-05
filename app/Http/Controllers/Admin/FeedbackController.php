<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index()
    {
        $feedbacks = Feedback::paginate(10);
        return view('admin.sections.feedback.index',[
            'title' => 'Feedback',
            'menu_active' => 'feedbacks',
            'feedbacks' => $feedbacks,
        ]);
    }

     public function detail(Feedback $feedback)
    {
        return view('admin.sections.feedback.detail',[
            'title' => 'Feedback',
            'menu_active' => 'feedbacks',
            'feedback' => $feedback,
        ]);
            
    }

     public function activate(Feedback $feedback)
    {
        $feedback->comment_status = true;
        $feedback->save();
        return redirect()->back()->with('success', 'Feedback comment activate');    
    }

    public function inactivate(Feedback $feedback)
    {
        $feedback->comment_status = false;
        $feedback->save();
        return redirect()->back()->with('success', 'Feedback comment inactivate');    
    }
    
           
    public function delete(Feedback $feedback)
    {
        $feedback->delete();
        return redirect()->route('admin.feedbacks')->with('success', 'feedback deleted successfully');
    }
}
