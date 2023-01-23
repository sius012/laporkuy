<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MasyarakatController extends Controller
{
    public function index(){
        
    }


    public function laporanSaya(Request $req){
        return view("masyarakat.laporansaya");
    }
}
