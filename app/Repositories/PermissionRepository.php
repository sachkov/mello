<?php

namespace App\Repositories;

use App\Models\Permission;
use App\Models\Post;

class PermissionRepository extends BaseRepository
{
    public function model()
    {
        return Permission::class;
    }
}
