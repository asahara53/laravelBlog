<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;

class Post extends Model
{
    protected $fillable = ['title', 'body'];

    public function post()
    {
        return $this->belongsToMany('App\Post');
    }
}
