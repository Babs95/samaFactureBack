<?php

namespace App\Repositories;

use App\Models\Typepaiement;

class TypepaiementRepository extends BaseRepository implements BaseRepositoryInterface
{
    function __construct(){

		$this->model=new Typepaiement();
	}
}
