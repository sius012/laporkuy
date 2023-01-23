<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Maklad\Permission\Traits\HasRoles;


class ResponLaporan extends Eloquent
{
    

    use HasFactory;
    protected $connection = 'mongodb';
    protected $collection = 'respon_laporan';
}

