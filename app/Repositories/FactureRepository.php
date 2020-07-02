<?php

namespace App\Repositories;

use App\Models\Facture;

class FactureRepository extends BaseRepository implements BaseRepositoryInterface
{
    function __construct(){

		$this->model=new Facture();
	}
}
