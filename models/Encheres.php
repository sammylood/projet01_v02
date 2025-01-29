<?php

namespace App\Models;

use App\Models\CRUD;

class Encheres extends CRUD
{

    protected $table = "test.encheres";
    protected $primaryKey = "id";
    protected $fillable = ['date_debut', 'date_fin', 'prix_debut', 'vedette'];
}
