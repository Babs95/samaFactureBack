<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Facture extends Model
{
    //
    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function fournisseur(){
        return $this->belongsTo(Fournisseur::class, 'fournisseur_id', 'id');
    }

    public function typepaiement(){
        return $this->belongsTo(Typepaiement::class, 'typepaiement_id', 'id');
    }

    public function annee(){
        return $this->belongsTo(Annee::class, 'annee_id', 'id');
    }

    public function mois(){
        return $this->belongsTo(Mois::class, 'mois_id', 'id');
    }
}
