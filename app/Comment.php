<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable=[
        'post_id',
        'author',
        'email',
        'is_active',
        'body',
        'photo'
    ];


    public function replies()
    {
        return $this->hasMany('App\CommentReply');
    }


    public function user()
    {
        return $this->hasMany('App\User');
    }
    public function post()
    {
        return $this->belongsTo('App\Post');
    }

    public function Photo()
    {
        return $this->belongsTo('App\Photo');
    }
}
