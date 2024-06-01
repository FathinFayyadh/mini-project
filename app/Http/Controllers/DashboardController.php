<?php

namespace App\Http\Controllers;

use App\Models\Boorkmark;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();
        $userRecomended = User::orderBy('created_at', 'desc')->take(5)->get();

        return view('dashboard', compact('posts','userRecomended' ));
    }   

    public function bookmarkstore()
    {
        $bookmarks = Boorkmark::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();
        return view('fitur.bookmark', compact('bookmarks'));

    } 
    public function profil()
    {

        return view('fitur.profil');
    }
    public function comment(Post $post)
    {
        // $post = $post->comments()->whereNull('parent_comment_id')->with('childComments.user')->get();
        return view('fitur.comment', compact('post'));
    }

    public function commentStore(Request $request, Post $post)
    {
        $request->validate([
            'content' => 'required',
        ]);

        $comment = $post->comments()->create([ 
            'user_id' => Auth::user()->id,
            'content' => $request->content
        ]);

        return back();
    }

    public function     commentReplayStore(Request $request, Comment $comment)
    {
        $request->validate([
            'content' => 'required',
        ]);

        $comment = $comment->parentComment()->create([
            'user_id' => Auth::user()->id,  
            'content' => $request->content,
            'post_id' => $comment->post_id,
            'parent_comment_id' => $comment->id
        ]);

        return back();
    }

    public function explore(Request $request){
        if ($request->has('search')) {
            $user = User::where('name', 'LIKE', '%' . $request->search . '%')->get();
        } else{
            $user = [];
            
        }
        $userRecomended = User::orderBy('created_at', 'desc')->take(5)->get();

            return view('fitur.explore', compact('user','userRecomended'));
    }


    public function maincontent()
    {
        return view('layout.maincontent');
    }

    public function notifikasi()
    {
        return view('fitur.notifikasi');
    }

    public function destroy(Comment $comment){
    $comment->delete();

    return back();
    }
    public function SettingProfil()
    {
        $user = Auth::user();
        return view('fitur.settingsprofil', compact('user'));
    }




}
