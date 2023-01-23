<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Role;
class UserController extends Controller
{
    public function logout(Request $req){
        Auth::logout();
        $req->session()->invalidate();
        $req->session()->regenerateToken();

        return redirect('/login');
    }

    public function getroles(){
        $role = Role::all()->toArray();
        return json_encode($role);
    }
}
