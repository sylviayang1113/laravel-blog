<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    protected $fillable = [
        'user_id', 'comment', 'post_id'
    ];

    // connect to user
    public function user() {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    // connect to comments
    public function comments()
    {
        return $this->hasMany(Comment::class, 'post_id', 'id')->orderBy('created_at', 'DESC');
    }

    // connect to category 
    public function Category(){
	
		return $this->belongsTo('App\Models\Category','cat_id');
	}
}
