<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post as PostModel;
use App\Models\Comment as CommentModel;
use App\Http\Requests\PostRequest;
use App\Http\Controllers\BaseController;

class PostsController extends BaseController
{
    private $post_model;
    private $comment_model;

    /** Postモデル、Commentモデルをインスタンス化する
     *
     * @param obj $post_model
     * @param obj $comment_model
     * @return void
     * @access public
     */
    public function __construct(PostModel $post_model, CommentModel $comment_model)
    {
        parent::__construct();
        $this->post_model = $post_model;
        $this->comment_model = $comment_model;
    }

    /** Indexページに全てのPostを表示する
     *
     * @return response
     * @access publid
     */
    public function index()
    {
    	return $this->render(['all_posts' => $this->post_model->getAllPosts()]);
    }

    /** 詳細ページに特定のPostとそれに関連したCommentを表示する
     *
     * @param int $id
     * @return response
     * @access public
     */
     public function show(int $id)
    {
     	return $this->render([
            'post' => $this->post_model->getPostFromId($id),
            'comments' => $this->comment_model->getAllCommentsFromPostId($id)
        ]);
    }

    /** Postを作成する画面を表示する
     *
     * @return response
     * @access public
     *
     */
     public function create()
    {
     	return $this->render();
    }

    /** Postを作成する
     *
     * @param obj $request
     * @return response
     * @access public
     */
     public function store(PostRequest $request)
    {
     	$id = $this->post_model->createPostAndGetId($request->all());
     	return redirect('posts/show/'.$id)->with('post', $this->post_model->getPostFromId($id));
    }

    /** Postを編集するページを表示する
     *
     * @param int $id
     * @return response
     * @access public
     */
	public function edit(int $id)
    {
        return $this->render(['post' => $this->post_model->getPostFromId($id)]);
    }

    /** Postを編集する
     *
     * @param int $id
     * @param obj $request
     * @return response
     * @access public
     */
    public function regist(PostRequest $request)
    {
        $inputs = $request->all();
        $this->post_model->updatePost($inputs);
        return redirect('posts/show/'.$inputs['id']);
    }

    /** Postを削除する
     *
     * @param int $id
     * @return response
     * @access public
     */
    public function destroy(int $id)
    {
        $this->post_model->deletePost($id);
        return redirect('/');
    }
}
