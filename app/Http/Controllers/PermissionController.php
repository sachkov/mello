<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddPermissionRequest;
use App\Http\Requests\UpdatePermissionRequest;
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
            'permissions' => $this->service->getAll()
        ]);
    }

    public function show($id)
    {
        return response()->json([
            'permission' => $this->service->get($id)
        ]);
    }

    public function store(AddPermissionRequest $request)
    {
        return response()->json([
            'permission' => $this->service->create($request->validated())
        ]);
    }

    public function update(UpdatePermissionRequest $request, int $permissionId)
    {
        return response()->json([
            'permission' => $this->service->update($request->validated(), $permissionId)
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
        $routes = $this->service->getRoutes();

        return response()->json([
            'routes' => $routes
        ]);
    }
}
