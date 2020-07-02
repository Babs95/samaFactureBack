<?php

namespace App\Repositories\Eloquent;

use App\Models\User;
use App\Repositories\Contracts\UserRepository;

use Kurt\Repoist\Repositories\Eloquent\AbstractRepository;

class EloquentUserRepository extends AbstractRepository implements UserRepository
{
    public function entity()
    {
        return User::class;
    }
}
