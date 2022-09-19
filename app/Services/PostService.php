<?php

namespace App\Services;

use App\Exceptions\PermissionException;
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
        return $this->repository->limit(10)->get();
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
        $authorId = $this->repository->findByField('id',$postId)->value('user_id');

        if(auth()->user()->id != $authorId){
            throw new PermissionException;
        }

        return $this->repository->update([
            'title'     => $post['title'],
            'content'   => $post['content']
        ], $postId);
    }

    public function delete($postId)
    {
        $authorId = $this->repository->findByField('id',$postId)->value('user_id');

        if(auth()->user()->id != $authorId){
            throw new PermissionException;
        }

        return $this->repository->delete($postId);
    }

    public function getMyPosts()
    {
        return $this->repository
            ->where('user_id', auth()->user()->id)
            ->limit(10)
            ->get();
    }
}
