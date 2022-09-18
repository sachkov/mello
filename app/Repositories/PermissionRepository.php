<?php

namespace App\Repositories;

use App\Models\Post;

class PermissionRepository extends BaseRepository
{
    public function model()
    {
        return Post::class;
    }
}
