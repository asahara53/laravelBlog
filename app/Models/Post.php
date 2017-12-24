<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;

class Post extends Model
{
    const LIMIT_GET_POST = 15;

    protected $fillable = ['title', 'body'];

    /** Commentとのリレーションを定義
     *
     * @return void
     * @access public
     */
    public function comments()
    {
    	return $this->hasMany('App\Comment');
    }

    /** 全てのPostを表示する(15件ごと)
     *
     * @return array
     * @access public
     */
    public function getAllPosts()
    {
        return $this->orderBy('created_at', 'desc')->paginate(self::LIMIT_GET_POST);
        //汎用性のために定数にしたが、self〜のところに
        //15と記載しても同じ結果
    }

    /** 特定のidからPostデータを取得
     *
     * @param int $id
     * @return void
     * @access public
     */
    public function getPostFromId(int $id)
    {
        return $this->find($id);
    }

    /** Postデータを作成
     *
     * @param obj $request
     * @return int $id
     * @access public
     */
    public function createPostAndGetId($request)
    {
        return $this->create($request)->id;
    }

    /** 特定のidからPostデータを削除
     *
     * @param $id
     * @return void
     * @access public
     */
    public function updatePost($request)
    {
        return $this->find($request['id'])
                    ->update($request);
    }

    /** 特定のidからPostデータを削除
     *
     * @param $id
     * @return void
     * @access public
     */
    public function deletePost(int $id)
    {
        return $this->find($id)
                    ->delete();
    }
}
