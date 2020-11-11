<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Auth;

class ProfileController extends Controller 
{

    public function index() {
        $posts = Post::where('user_id', Auth::id())
                        ->orderBy('created_at', 'DESC')
                        ->get();
            $data = [
                'posts' => $posts
            ];
        return view('profile.index', $data);
    }
}
