<?php

namespace App\Repositories;

use App\Models\Annee;

class AnneeRepository extends BaseRepository implements BaseRepositoryInterface
{
    function __construct(){

		$this->model=new Annee();
	}
}
