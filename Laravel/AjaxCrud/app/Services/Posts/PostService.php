<?php

namespace App\Services\Posts;

use App\Contracts\Dao\Posts\PostDaoInterface;
use App\Contracts\Services\Posts\PostServiceInterface;

class PostService implements PostServiceInterface
{
    /**
     * post service
     */
    private $postDao;
    /**
     * Class Constructor
     * @param PostDaoInterface
     * @return
     */
    public function __construct(PostDaoInterface $postDao)
    {
        $this->postDao = $postDao;
    }
    /**
     * To get posts
     * @return $posts
     */
    public function getPosts()
    {
        $data = $this->postDao->getPosts();
        return $data;
    }
    /**
     * To store posts
     * @param $request
     * @return $post
     */
    public function storePosts($request)
    {
        $post = $this->postDao->storePosts($request);
        return $post;
    }
    /**
     * To edit posts
     * @param $id
     * @return $post
     */
    public function editPosts($id)
    {
        $post = $this->postDao->editPosts($id);
        return $post;
    }
    /**
     * To delete posts
     * @param $id
     * @return $post
     */
    public function deletePosts($id)
    {
        $post = $this->postDao->deletePosts($id);
        return $post;
    }
}
