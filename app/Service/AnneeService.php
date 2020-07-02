<?php

namespace App\Service;
use App\Repositories\AnneeRepository;

class AnneeService extends BaseService
{
    function __construct(AnneeRepository $repository){
		$this->repository=new $repository;

	}
}
