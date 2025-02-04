<?php

namespace App\Models;

use App\Models\CRUD;

class Conditions extends CRUD
{

    protected $table = "test.conditions";
    protected $primaryKey = "id_condition";
    protected $fillable = ['niveau'];
}
