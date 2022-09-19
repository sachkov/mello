<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
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

    public function show($postId)
    {
        return response()->json([
            'post' => $this->service->get($postId)
        ]);
    }

    public function store(PostRequest $request)
    {
        return response()->json([
            'post' => $this->service->create($request->validated())
        ]);
    }

    public function update(PostRequest $request, int $postId)
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
