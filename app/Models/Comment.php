<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    // connect to user
    public function user() {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

   
    // connect to posts
    public function post() {
        return $this->belongsTo('App\Models\Post', 'post_id');
    }
}
