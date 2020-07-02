<?php

namespace App\Repositories;

use App\Models\Mois;

class MoisRepository extends BaseRepository implements BaseRepositoryInterface
{
    function __construct(){

		$this->model=new Mois();
	}
}
