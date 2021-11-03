<?php

namespace App\Contracts\Services\Posts;

use Illuminate\Http\Request;

interface PostServiceInterface
{
    /**
     * To get posts
     * @return $posts
     */
    public function getPosts();
    /**
     * To store posts
     * @param $request
     * @return $post
     */
    public function storePosts($request);
    /**
     * To edit posts
     * @param $id
     * @return $post
     */
    public function editPosts($id);
    /**
     * To delete posts
     * @param $id
     * @return $post
     */
    public function deletePosts($id);
}
