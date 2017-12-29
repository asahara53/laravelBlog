<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Http\Requests\CommentRequest;
use App\Models\Post as PostModel;
use App\Models\Comment as CommentModel;

class CommentsController extends Controller
{
    private $comment_model;

    /** コメントモデルをインスタンス化する
    *
    * @param obj $comment_model
    * @return void
    * @access public
    */
    public function __construct(CommentModel $comment_model)
    {
        $this->comment_model = $comment_model;
    }

    /** コメントを生成する
    *
    * @param obj $request
    * @param int $id
    * @return response
    * @access public
    */
    public function store(CommentRequest $request)
    {
        $inputs = $request->all();
        $this->comment_model->saveComment($inputs);
    	return redirect('posts/show/'.$inputs['post_id']);
    }

    /** コメントを削除する
    *
    * @param int $id
    * @return response
    * @access public
    */
    public function destroy(int $id)
    {
    	$this->comment_model->delete($id);
    	return redirect()->back();
    }
}
