<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UsersController extends Controller
{

       public function index()
       {
           $users = User::paginate(10);
           return view('admin.sections.users.index', [
               'title' => 'Users',
               'menu_active' => 'users',
               'users' => $users
           ]);
       }
       
       public function delete(User $user):RedirectResponse
       {
           $user->delete();
           return redirect()->route('admin.users')->with('success', 'User deleted successfully');
       }

    
}
