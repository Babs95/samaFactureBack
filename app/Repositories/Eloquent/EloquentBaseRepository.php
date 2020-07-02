<?php

namespace App\Repositories\Eloquent;

use App\Base;
use App\Repositories\Contracts\BaseRepository;

use Kurt\Repoist\Repositories\Eloquent\AbstractRepository;

class EloquentBaseRepository extends AbstractRepository implements BaseRepository
{
    public function entity()
    {
        return Base::class;
    }
}
