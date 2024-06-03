<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateCandidateRequest;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Candidate;
use Illuminate\Support\Facades\Auth;
class AdminController extends Controller
{
    public function dashboard()
    {
        $posts = Post::with('candidates')->get();
        return view('admin.dashboard', compact('posts'));
    }

    public function createPost(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Post::create(['name' => $request->name]);

        return redirect()->route('admin.dashboard')->with('success', 'Post created successfully.');
    }

    public function addCandidate(Request $request, Post $post)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        if ($post->candidates()->count() >= 4) {
            return redirect()->route('admin.dashboard')->with('error', 'Cannot add more than 4 candidates per post.');
        }

        $post->candidates()->create(['name' => $request->name]);

        return redirect()->route('admin.dashboard')->with('success', 'Candidate added successfully.');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function removeCandidate(Candidate $candidate){
        $candidate->delete();

        return redirect()->back()->with('success', 'Candidate deleted successfully.');

    }


}
