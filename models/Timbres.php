<?php
namespace App\Models;
use App\Models\CRUD;

class Timbres extends CRUD{

    protected $table = "test.timbres";
    protected $primaryKey = "id_timbre";
    protected $fillable = ['nom', 'annee', 'couleur', 'tirage', 'dimensions', 'certifie', 'users_id_user', 'encheres_id_enchere', 'pays_id_pays', 'conditions_id_condition'];
}