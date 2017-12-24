<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
	protected $fillable =['body'];
    //
    public function post(){
    	return $this->belongsTo('App\Post');
    }
    public function getAllCommentsFromPostId(int $post_id)
    {
        return $this->where('post_id', $post_id)->get();
    }
}
