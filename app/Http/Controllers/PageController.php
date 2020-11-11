<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;

class PageController extends Controller
{
    // home page
    public function index() {
        return view('index');
    }

    // about us page
    public function about() {
        return view('about');
    }

    // explore page
    public function explore() {
        $post = Post::orderBy('created_at', 'DESC')
                        ->limit(5)
                        ->with('user')
                        ->get();
        $data = [
        'posts' => $post
        ];
        return view('explore', $data);
    }

    // faq page
    public function faq() {
        return view('faq');
    
    }
}
