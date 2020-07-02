<?php

namespace App\Service;
use App\Repositories\UserRepository;

class UserService extends BaseService
{
    function __construct(UserRepository $repository){
		$this->repository=new $repository;

	}
}
