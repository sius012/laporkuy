<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
class PengaturanAkunController extends Controller
{
    public function index(){
        $user = Auth::user()->toArray();
   
        
        return view("general.pengaturanakun",["latat"=>true, "user"=>$user]);
    }


    public function perbaruiakun(Request $req){
        $id = Auth::user()->id;
        
        foreach($req->input() as $row => $f){
            if($row!="token"){
                $arr = [];
                $arr[$row] = $f;
                User::where("_id",$id)->update($arr);
            }
        }

        return redirect()->back();

        //IF PASSWORD
        
        
        //dd($req->input()); 
    }
}