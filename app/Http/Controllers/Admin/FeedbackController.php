<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return view('admin.sections.task.index',[
            'title' => 'Tasks',
            'menu_active' => 'task',
            'nav_sub_menu' => '',
            'tasks' => $tasks,
        ]);
    }
}
