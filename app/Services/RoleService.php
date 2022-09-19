<?php

namespace App\Services;

use App\Repositories\PermissionRepository;
use App\Repositories\RoleRepository;

class RoleService
{
    protected $roleRepository;
    protected $permissionRepository;

    public function __construct(
        RoleRepository $roleRepository,
        PermissionRepository $permissionRepository
    ) {
        $this->roleRepository = $roleRepository;
        $this->permissionRepository = $permissionRepository;
    }

    public function sync_permissions(array $request, $roleId)
    {
        $role = $this->roleRepository->find($roleId);

        $arPermissions = $request['permissions'];

        $permissions = $this->permissionRepository
            ->whereIn('id', $arPermissions);

        $permissionsIds = $permissions
            ->select('id')
            ->pluck('id')
            ->all();

        $role->permissions()->sync($permissionsIds);

        $permissionsCollection = $permissions
            ->with('roles')
            ->get();

        return $permissionsCollection;
    }
}
