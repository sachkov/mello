<?php

namespace App\Services;

use App\Repositories\PermissionRepository;

class PermissionService
{
    protected $repository;

    public function __construct(PermissionRepository $repository) {
        $this->repository = $repository;
    }

    public function get(int $id)
    {
        $permission = $this->repository
            ->with('roles')
            ->findByField('id',$id)
            ->first();

        return $permission ?? new \stdClass;
    }

    public function getAll()
    {
        return $this->repository->with('roles')->get();
    }

    public function create(array $permission)
    {
        return $this->repository->create($permission);
    }

    public function update(array $permission, $permissionId)
    {
        $permission = $this->repository->update($permission, $permissionId);

        return $permission->with('roles')->first();
    }

    public function delete($permissionId)
    {
        return $this->repository->delete($permissionId);
    }

    public function getRoutes():array
    {
        $routeCollection = \Illuminate\Support\Facades\Route::getRoutes();
        $res = [];

        foreach ($routeCollection as $value) {
            if(isset($value->action['as'])){
                if(strpos($value->action['as'], 'ignition') !== false) continue;

                $res[] = $value->action['as'];
            }
        }

        return $res;
    }
}
