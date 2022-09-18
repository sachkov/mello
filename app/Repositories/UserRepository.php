<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository extends BaseRepository
{
    public function model()
    {
        return User::class;
    }

    public function isAdmin(User $user):bool
    {
        return (bool) $user->roles()->where('code', 'admin')->value('user_id');
    }

    public function havePermission(User $user, string $code):bool
    {
        $userId = $user->whereHas(
            'roles.permissions',
            fn($query) => $query->where('code', $code)
        )->value('users.id');

        return (bool) $userId;
    }
}
