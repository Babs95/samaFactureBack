<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository extends BaseRepository implements BaseRepositoryInterface
{
    function __construct(){

		$this->model=new User();
	}
}
