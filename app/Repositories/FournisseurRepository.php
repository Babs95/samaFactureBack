<?php

namespace App\Repositories;

use App\Models\Fournisseur;

class FournisseurRepository extends BaseRepository implements BaseRepositoryInterface
{
    function __construct(){

		$this->model=new Fournisseur();
	}
}
