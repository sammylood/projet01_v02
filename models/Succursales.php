<?php
namespace App\Models;
use App\Models\CRUD;

class Succursales extends CRUD{

    protected $table = "test.succursales";
    protected $primaryKey = "id_succursale";
    protected $fillable = ['nom'];
}