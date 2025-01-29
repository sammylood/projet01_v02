<?php

namespace App\Models;

use App\Models\CRUD;

class Images extends CRUD
{

    protected $table = "test.images";
    protected $primaryKey = "id_image";
    protected $fillable = ['image_url', 'principale', 'timbres_id_timbre'];
}
