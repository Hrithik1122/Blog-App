<?php

namespace App\Http\Controllers;
use App\Models\Posts;
use App\Models\User;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    {
        // $posts = Posts::all();
        $posts = Posts::latest()->paginate(10);
        $users = User::all();
        // dd($posts);
        return view('welcome', compact('posts','users'));
    }
    
}
