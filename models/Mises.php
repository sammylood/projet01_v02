<?php

namespace App\Models;

use App\Models\CRUD;

class Mises extends CRUD
{

    protected $table = "test.mises";
    protected $primaryKey = "id_mise";
    protected $fillable = ['montant_mise', 'users_id', 'encheres_id'];
}
