<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Vote;
use Illuminate\Support\Facades\Session;

use Illuminate\Support\Facades\Mail;

use App\Mail\VotePlaced;
use App\Mail\AdminVoteNotification;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::check() && Auth::user()) {
            return redirect()->route('admin.dashboard');
        }

        return view('welcome');
    }

    public function submitEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        Session::put('email', $request->email);

        $posts = Post::with('candidates')->get();

        return view('vote', compact('posts'));
    }

    public function vote(Request $request)
    {
        $email = Session::get('email');

        if (!$email) {
            return redirect()->route('welcome')->with('error', 'Please enter your email first.');
        }

        $request->validate([
            'votes' => 'required|array',
            'votes.*' => 'exists:candidates,id',
        ]);

        $votes = [];

        foreach ($request->votes as $postId => $candidateId) {
            if (Vote::hasVoted($email, $postId)) {
                return redirect()->route('welcome')->with('error', 'You can only vote once per post.');
            }

            $vote = Vote::create([
                'email' => $email,
                'post_id' => $postId,
                'candidate_id' => $candidateId,
            ]);

            $vote->load('post', 'candidate');
            $votes[] = $vote;

            // dd('User email:', ['email' => $email]);
            // dd($email);

        }

        // Get the user data (assuming you have a User model associated with the email)
        // $user = Auth::user();

        // Send email to the user
        Mail::to($email)->send(new VotePlaced($email, $votes));

        // Send email to the admin
        Mail::to('frutsendi@gmail.com')->send(new AdminVoteNotification($email, $votes));


        return redirect()->route('welcome')->with('success', 'Voted successful and email notifications sent.');


    }
}
