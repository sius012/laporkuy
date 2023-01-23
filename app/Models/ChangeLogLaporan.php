<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class ChangeLogLaporan extends Eloquent
{
    use HasFactory;

    protected $table = "changeLogLaporan";
    protected $fillable = ["log","id_laporan"];
}
