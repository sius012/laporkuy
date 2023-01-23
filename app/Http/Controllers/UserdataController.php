<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Maklad\Permission\Models\Role;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class UserdataController extends Controller
{
    public function index(Request $req){
        $data = $this->getUser("all");
        
        
     //  dd($data);

        
        

        return view("admin.userManagement.index",["datauser"=>$data]);
    }


    //HELPER DAN SEGALA COCOKLOGI YANG ADA----------------------------------------------------------------------------------------------------------------
    public function getUser($single,$id=null){
        $data = new User();
        
        if($single == "all"){
            $data = $data->all()->toArray();
            //getRolesData 
            foreach($data as $i => $datas){
                foreach($datas["role_ids"] as $j => $roleids){
                    $roles = Role::find($roleids)->toArray();

                    $data[$i]["rolesdata"][$j] = $roles;
                }
            }
        }else{
            $data = $data->find($id)->toArray();
            foreach($data["role_ids"] as $j => $roleids){
                $roles = Role::find($roleids)->toArray();

                $data["rolesdata"][$j] = $roles;
            }
        }
        
        

        return $data;
    }
    //HELPER DAN SEGALA COCOKLOGI YANG ADA----------------------------------------------------------------------------------------------------------------



    public function getuserdetail(Request $req){
        $data = $this->getUser("single", $req->id);
        return json_encode($data);
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }
    
    public function tambahuser(Request $req){
        // $req->validate([
        //     'name' => ['required', 'string', 'max:255'],
        //     'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        //     'password' => ['required', 'string', 'min:8', 'confirmed'],
        // ]);
        $data = $req->input();
    
    
        $regCon = new RegisterController();
        $regCon->create($req->input());
        
        Alert::success("Akun Berhasil Ditambahkan", $data["name"]. " telah terdaftar sebagai ". $data["role"]);
        return redirect()->back();

    }
}
