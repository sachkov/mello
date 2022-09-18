<?php

namespace App\Services;

use App\Repositories\PostRepository;

class PostService
{
    protected $repository;

    public function __construct(PostRepository $postRepository) {
        $this->repository = $postRepository;
    }

    public function get(int $id)
    {
        return $this->repository->findByField('id',$id)->first() ?? new \stdClass;
    }

    public function getLastPosts()
    {
        return $this->repository->limit(10);
    }

    public function create(array $post)
    {
        return $this->repository->create([
            'user_id'   => auth()->user()->id,
            'title'     => $post['title'],
            'content'   => $post['content']
        ]);
    }

    public function update(array $post, $postId)
    {
        return $this->repository->update([
            'user_id'   => auth()->user()->id,
            'title'     => $post['title'],
            'content'   => $post['content']
        ], $postId);
    }

    public function delete($postId)
    {
        return $this->repository->delete($postId);
    }

    public function getMyPosts()
    {
        return $this->repository->where('user_id', auth()->user()->id)->limit(10);
    }
}
