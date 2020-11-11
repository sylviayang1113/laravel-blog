<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;

use Session;
use Auth;
class PostController extends Controller
{
    // create post
    public function create() {

        $data = [
            'isNew' => true, // create or edit flag
            'post' => new Post
        ];     
        return view('post.create-edit', $data);
    }


    // submit your post
    public function createSubmit(Request $request) {
        $request->validate([
            'title' => 'required',
            'cat_id' => 'required',
            'content' => 'required'
        ]);

        $post = new Post();

        $post->title = $request->title;
        $post->cat_id = $request->cat_id;
        $post->user_id = Auth::id();
        $post->content = $request->content;
        $post->save();

        Session::flash('success_message', 'Your post has been created');
        return redirect()->route('post.view', $post->id);
    }

    // edit post
    public function edit($id) {
        $post = Post::where('user_id', Auth::id())
                    ->where('id', $id)
                    ->first();
        if(empty($post)) {
            abort(404);
        }

        $data = [
            'isNew' => false, // create or edit flag
            'post' => $post
        ];

        return view('post.create-edit', $data);
    }

    // update post
    public function update(Request $request) {
        $post = Post::where('user_id', Auth::id())
                    ->where('id', $request->post)
                    ->first();
        $request->validate([
            'title' => 'required',
            'cat_id' => 'required',
            'content' => 'required'
        ]);
        
        $post->title = $request->title;
        $post->cat_id = $request->cat_id;
        $post->user_id = Auth::id();
        $post->content = $request->content;
        $post->update();

        Session::flash('success_message', 'Your post has been successfully updated');
        return redirect()->route('post.view', $post->id);
    }

    // redirect to post view
    public function view($id) {
        $post = Post::where('id', $id)
                    ->first();
        if(empty($post)) {
            abort(404);
        }
        $data = [
            'post' => $post
        ];

        return view('post.view', $data);
    }

    // delete post 
    public function delete($id) {
        $post = Post::where('user_id', Auth::id())
                ->where('id', $id)
                ->first();
        if(empty($post)) {
            abort(404);
        }

        $post->delete();

        Session::flash('success_message', 'Your post '.$post->title.' has been successfully deleted');
        return redirect()->route('profile.index');
    }

   
}
