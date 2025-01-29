<?php
namespace App\Models;
use App\Models\CRUD;

class Voitures extends CRUD{

    protected $table = "test.voitures";
    protected $primaryKey = "id_voitures";
    protected $fillable = ['modele', 'annee', 'type', 'id_succursale'];
}