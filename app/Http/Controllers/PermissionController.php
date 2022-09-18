<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Services\PermissionService;

class PermissionController extends Controller
{
    public function __construct(PermissionService $permissionService) {
        $this->service = $permissionService;

        $this->middleware('auth');
        $this->middleware('permission');
    }

    public function index()
    {
        return response()->json([
            'posts' => $this->service->getAll()
        ]);
    }

    public function show($id)
    {
        return response()->json([
            'post' => $this->service->get($id)
        ]);
    }

    public function store(PostRequest $request)
    {
        return response()->json([
            'post' => $this->service->create($request->validated())
        ]);
    }

    public function update(PostRequest $request, int $permissionId)
    {
        return response()->json([
            'post' => $this->service->update($request->validated(), $permissionId)
        ]);
    }

    public function destroy(int $permissionId)
    {
        return response()->json([
            'result' => $this->service->delete($permissionId)
        ]);
    }

    public function routes()
    {
        $routeCollection = \Illuminate\Support\Facades\Route::getRoutes();

        foreach ($routeCollection as $value) {
            if(isset($value->action['as'])) $arr[] = $value->action['as'];
        }

        return response()->json([
            'routes' => $arr
        ]);
    }
}
