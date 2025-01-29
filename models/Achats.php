<?php
namespace App\Models;
use App\Models\CRUD;

class Achats extends CRUD{

    protected $table = "test.achats";
    protected $primaryKey = "id";
    protected $fillable = ['date_achat', 'id_voiture', 'id_client', 'id_succursale'];
}