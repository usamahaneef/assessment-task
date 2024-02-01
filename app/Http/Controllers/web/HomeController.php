<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

        $feedbacks = Feedback::orderBy('id', 'ASC')->paginate(10);
        return view('web.index',[
            'title' => 'Home',
            'feedbacks' => $feedbacks,
        ]);
    }
    
}
