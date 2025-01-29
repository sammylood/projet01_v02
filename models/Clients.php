<?php

namespace App\Models;

use App\Models\CRUD;

class Clients extends CRUD
{

    protected $table = "test.clients";
    protected $primaryKey = "id";
    protected $fillable = ['nom', 'adresse', 'tel', 'code_postal', 'courriel'];
}