<?php

namespace App\Repositories\Eloquent;

use App\test;
use App\Repositories\Contracts\testRepository;

use Kurt\Repoist\Repositories\Eloquent\AbstractRepository;

class EloquenttestRepository extends AbstractRepository implements testRepository
{
    public function entity()
    {
        return test::class;
    }
}
