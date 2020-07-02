<?php

namespace App\Service;
use App\Repositories\FactureRepository;

class FactureService extends BaseService
{
    function __construct(FactureRepository $repository){
		$this->repository=new $repository;

	}
}
