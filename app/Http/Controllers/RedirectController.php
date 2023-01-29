<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RedirectController extends Controller
{
    public function index(){
        if(User::hasRole("admin")){
            return redirect("/admin/dashboard");
        }if(User::hasRole("masyarakat")){
            return redirect("/");
        }if(User::hasRole("petugas")){
            return redirect("/petugas/tugassaya");
        }   
    }
}