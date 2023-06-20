<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Posts;

class HomeController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function show(){
        // $posts = Posts::all();
        // return view('admin/dashboard', compact('posts'));

        $posts = Posts::select('posts.*', 'users.name as username')
            ->join('users', 'users.id', '=', 'posts.user_id')
            ->paginate(10);

        return view('admin/dashboard', compact('posts'));
    }

    public function userlist(){
        // $posts = Posts::all();
        // return view('admin/dashboard', compact('posts'));

        $users = User::all();
        return view('admin/user-list', compact('users'));
    }

    public function block(User $user)
    {
        $user->blocked = true;
        $user->save();
        return redirect()->back()->with('success', 'User blocked successfully');
    }

    public function unblock(User $user)
    {
        $user->blocked = false;
        $user->save();
        return redirect()->back()->with('success', 'User unblocked successfully');
    }

    public function postedit(Posts $posts)
    {
        return view('admin/edit', compact('posts'));
    }

    public function postupdate(Request $request, Posts $posts)
    {

        $posts->update($request->all());

        return redirect('admin/dashboard')->with('success', 'Blog updated successfully.');
    }

    public function postdelete(Posts $posts)
    {
        $posts->delete();

        return redirect('admin/dashboard')->with('success', 'Blog deleted successfully.');
    }
}