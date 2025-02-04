<?php

namespace App\Models;

use App\Models\CRUD;

class Countries extends CRUD
{

    protected $table = "test.countries";
    protected $primaryKey = "id_country";
    protected $fillable = ['country_name', 'code'];
}
