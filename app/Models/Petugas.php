<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;


class Petugas extends Eloquent
{
    use HasRoles;

    
    use HasFactory;
    protected $connection = 'mongodb';
    protected $collection = 'users';
}
