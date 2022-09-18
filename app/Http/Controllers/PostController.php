<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Services\PostService;

class PostController extends Controller
{
    public function __construct(PostService $postService) {
        $this->service = $postService;

        $this->middleware('auth');
        $this->middleware('permission');
    }

    public function index()
    {
        return response()->json([
            'posts' => $this->service->getLastPosts()
        ]);
    }

    public function show($id)
    {
        return response()->json([
            'post' => $this->service->get($id)
        ]);
    }

    public function store(CreatePostRequest $request)
    {
        return response()->json([
            'post' => $this->service->create($request->validated())
        ]);
    }

    public function update(CreatePostRequest $request, int $postId)
    {
        return response()->json([
            'post' => $this->service->update($request->validated(), $postId)
        ]);
    }

    public function destroy(int $postId)
    {
        return response()->json([
            'result' => $this->service->delete($postId)
        ]);
    }

    public function my_posts()
    {
        return response()->json([
            'posts' => $this->service->getMyPosts()
        ]);
    }
}
