<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;

use Auth;
use Session;
class CommentController extends Controller
{
   // add comment
   public function store(Request $request) {
      $request->validate(
         ['comment' => 'required|min:3'],
         ['comment.required' => 'Please enter you comment']
      );

      $comment = new Comment;
      $comment->user_id = Auth::id();
      $comment->comment = request('comment');
      $comment->post_id = $request->post_id;
      $comment->save();

      

      Session::flash('success_message', 'You have successfully commented');
      return back();

  }


  // show comment
  public function index(Request $request) {

   $post->comments()->save(new Comment([
      'user_id' => Auth::id(),
      'comment' => $request->post('comment')
   ]));
  }


}