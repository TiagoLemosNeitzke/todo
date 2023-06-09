<?php

namespace App\Services;

use App\Models\User;

class UserService
{
    public static function getUserByEmail($email): ?User
    {
        return User::query()->where('email', $email)->first();
    }
}
