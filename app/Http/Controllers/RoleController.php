<?php

namespace App\Http\Controllers;

use App\Http\Requests\BindRolePermissionsRequest;
use App\Services\RoleService;

class RoleController extends Controller
{
    public function __construct(RoleService $permissionService) {
        $this->service = $permissionService;

        $this->middleware('auth');
        $this->middleware('permission');
    }

    public function bind_permissions(BindRolePermissionsRequest $request, $roleId)
    {
        $this->service->sync_permissions($request->validated(), $roleId);

        return response()->json([
            'result' => 'permissions was binded.'
        ]);
    }
}
