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
                
                if($row=="password"){
                    $arr[$row] = Hash::make($f);
                }else{
                    
                }

                User::where("_id",$id)->update($arr);
                
            }
        }   

        //check if image uploaded
        if($req->hasFile("foto_profil")){
            $image = base64_encode(file_get_contents($req->file("foto_profil")));
            User::where("_id",$id)->update(["foto_profil"=>"data:image/jpg;base64,".$image]);
        }

        return redirect()->back();

        //IF PASSWORD
        
        
        //dd($req->input()); 
    }
}