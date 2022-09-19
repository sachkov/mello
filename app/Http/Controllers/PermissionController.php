<?php

namespace App\Http\Controllers;

use App\Http\Requests\PermissionRequest;
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

    public function store(PermissionRequest $request)
    {
        return response()->json([
            'post' => $this->service->create($request->validated())
        ]);
    }

    public function update(PermissionRequest $request, int $permissionId)
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
        $routes = $this->service->getRoures();

        return response()->json([
            'routes' => $routes
        ]);
    }
}
