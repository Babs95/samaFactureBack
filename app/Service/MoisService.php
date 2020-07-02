<?php

namespace App\Service;
use App\Repositories\MoisRepository;

class MoisService extends BaseService
{
    function __construct(MoisRepository $repository){
		$this->repository=new $repository;

	}
}
