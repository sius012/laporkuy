<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Maklad\Permission\Traits\HasRoles;
use Maklad\Permission\Models\Role;
use Auth;

class User extends  Authenticatable
{
  
    use HasApiTokens, HasFactory, Notifiable,HasRoles;
    protected $collection = "users";
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];
    protected $guard_name = 'web';

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function hasRole($role){
        $roles = [$role];

        
        if (Auth::check()) {

            $myRole = auth()->user()->role_ids;
        
            $canLogin = false;
            foreach($myRole as $mr){
                $roleku = Role::where("_id",$mr)->first()->name;
                if(in_array($roleku, $roles)){
                  return true;
                }
            }

            if($canLogin == true){
                return true;
            }

            return false;
        
            
          }else{
            return false;
          }
    }


    public static function myRole(){
        $role = [];
            if (Auth::check()) {

            $myRole = auth()->user()->role_ids;
        
            $canLogin = false;
            foreach($myRole as $i=> $mr){
                $roleku = Role::where("_id",$mr)->first()->name;
                $role[$i] = $roleku;
            }
            
          }else{
            return ["netrality"];
          }

          return $role;
    }

    
}