<?php

namespace App\Service;
use App\Repositories\TypepaiementRepository;

class TypepaiementService extends BaseService
{
    function __construct(TypepaiementRepository $repository){
		$this->repository=new $repository;

	}
}
