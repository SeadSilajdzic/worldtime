<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $fillable = [
        'user_id',
        'comment_id',
        'is_active',
        'author',
        'email',
        'content'
    ];

    public function comment(){
        return $this->belongsTo(Comment::class);
    }

    public function post(){
        return $this->belongsTo(Post::class);
    }
}
