<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */

    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'title' => 'required',
        //     'description' => 'required',
        // ]);

        // dd($request->all());
        $posts = new Posts;

        $posts->user_id = $request->user_id;
        $posts->title = $request->input('title');
        $posts->description = html_entity_decode($request->input('description'));
        $posts->save();

        return redirect('/')->with('status','Blog published successfully');
    }

    public function show()
    {
        $id = auth()->id();
        $posts = Posts::where('user_id',$id)->get(); 
        return view('/my-posts', compact('posts'));
    }

    public function postedit($id)
    {
        // ----------------------------------------------------------------------
        // Using authentication where user cannot go another person post from URL
        // ----------------------------------------------------------------------
        $user_id = auth()->id();
        $posts = Posts::where('user_id',$user_id)->findOrFail($id);
        return view('edit', compact('posts'));
    }

    public function postupdate(Request $request, Posts $posts)
    {

        $posts->update($request->all());

        return redirect('my-posts')->with('success', 'Blog updated successfully.');
    }

    public function postdelete(Posts $posts)
    {
        $posts->delete();

        return redirect('my-posts')->with('success', 'Blog deleted successfully.');
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
