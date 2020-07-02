<?php

namespace App\Service;
use App\Repositories\FournisseurRepository;

class FournisseurService extends BaseService
{
    function __construct(FournisseurRepository $repository){
		$this->repository=new $repository;

	}
}
