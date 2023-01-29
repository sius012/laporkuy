<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maklad\Permission\Exceptions\UnauthorizedRole;
use Maklad\Permission\Helpers;

use App\Models\Role;
class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, string|array $role)
    {
        $roles = is_array($role) ? $role  : explode("|", $role);

        
        if (Auth::check()) {

            $myRole = auth()->user()->role_ids;
        
            $canLogin = false;
            foreach($myRole as $mr){
                $roleku = Role::where("_id",$mr)->first()->name;
                if(in_array($roleku, $roles)){
                  return $next($request);
                }
            }

            if($canLogin == false){
                $helpers = new Helpers();
                throw new UnauthorizedRole(403, $helpers->getUnauthorizedRoleMessage(implode(', ', $myRole)), $roles);
            }

            //Check Roles
        
            
          }else{
            
            return redirect("login");
          }
        
        
    }
}