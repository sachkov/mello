<?php

namespace App\Services;

use App\Exceptions\PermissionException;
use App\Models\User;
use App\Repositories\UserRepository;


class UserService
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository) {
        $this->userRepository = $userRepository;
    }

    public function create(array $form):User
    {
        $form['password'] = bcrypt($form['password']);

        return $this->userRepository->create($form);
    }

    public function createNewToken($token){
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
            'user' => auth()->user()
        ]);
    }

    public function checkPermission(User $user, string $route)
    {
        if($this->userRepository->isAdmin($user)) return true;

        if(! $this->userRepository->havePermission($user, $route)){
            throw new PermissionException;
        }
    }
}
