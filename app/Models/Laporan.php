<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;


class Laporan extends Eloquent
{
    use HasFactory;
    protected $primaryKey = "_id";
    protected $connection = 'mongodb';
    protected $collection = 'laporan';
    protected $fillable = [
        'judul_laporan',
        'isi_laporan',
        'pengirim',
        'petugas',
        'admin',
        'lampiran',
        'status',
    ];
}
