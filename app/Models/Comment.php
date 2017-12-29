<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'body',
        'post_id',
    ];

    /** Postとのリレーション定義
     *
     * @return void
     * @access public
     */
    public function post()
    {
        return $this->belongsTo('App\Post');
    }

    /** Comment生成
     *
     * @param array $inputs
     * @return void
     * @access public
     */
    public function saveComment($inputs)
    { 
        return $this->create($inputs);
    }

    /** Comment削除
     *
     * @param int $id
     * @return void
     * @access public
     */
    public function deleteComment($id)
    { 
        return $this->findOrFail($id)
                    ->delete();
    }

    /** PostIdから全てのCommentを取得
    /** PostIdから全てのCommentを取得
     *
     * @param int $post_id
     * @return array comments
     * @access public
     */
    public function getAllCommentsFromPostId(int $post_id)
    {
        return $this->where('post_id', $post_id)->get();
    }
    
}
