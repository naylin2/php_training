<?php
namespace App\Dao\Posts;

use App\Contracts\Dao\Posts\PostDaoInterface;
use App\Models\Post;

class PostDao implements PostDaoInterface
{
    /**
     * To get posts
     * @return $posts
     */
    public function getPosts()
    {
        $data = Post::orderBy('id', 'desc')->get();
        return $data;
    }
    /**
     * To store posts
     * @param $request
     * @return $posts
     */
    public function storePosts($request)
    {
        $postID = $request->post_id;
        $post = Post::updateOrCreate(['id' => $postID],
            ['title' => $request->title, 'body' => $request->body]);
        return $post;
    }
    /**
     * To edit posts
     * @param $id
     * @return $post
     */
    public function editPosts($id)
    {
        $where = array('id' => $id);
        $post = Post::where($where)->first();
        return $post;
    }
    /**
     * To delete posts
     * @param $id
     * @return $post
     */
    public function deletePosts($id)
    {
        $post = Post::where('id', $id)->delete();
        return $post;
    }
}
