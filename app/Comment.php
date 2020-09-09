<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'user_id',
        'post_id',
        'is_active',
        'author',
        'email',
        'content'
    ];

    public function replies(){
        return $this->hasMany(Reply::class);
    }

    public function post(){
        return $this->belongsTo(Post::class);
    }
}
