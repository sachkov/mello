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
        return $this->repository->findByField('id',$id)->first() ?? new \stdClass;
    }

    public function getAll()
    {
        return $this->repository->get();
    }

    public function create(array $permission)
    {
        return $this->repository->create($permission);
    }

    public function update(array $permission, $permissionId)
    {
        return $this->repository->update($permission, $permissionId);
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
            if(isset($value->action['as'])) $res[] = $value->action['as'];
        }

        return $res;
    }
}
