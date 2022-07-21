<?php
namespace App\Traits;
use App\Models\permission;
use App\Models\Role;

trait HasPermissionTraits{
    //give permission

    public function getAllPermissions($permission){
        return Permission ::whereIn('slug',$permission)->get();
    }

    // check has permission
    public function HasPermission($permission){
        return (bool) $this->permissions->where('slug',$permission->slug)->count();
    }

    public function hasRoles($roles){
        foreach($roles as $role){
            if($this->roles->contains('slug',$slug)){
                return true;
            }
        }
        return false;
    }

    public function hasPermissionTo($permission){
        return $this->hasPermissionThroughRole($permission) || $this->hasPermission($permission);
    }

    public function hasPermissionThroughRole($permission){
        foreach($permission->roles as $role){
            if($this->roles->contains($role)){
                return true;
            }
        }
        return false;
    }

    public function givePermissionTo(...$permissions){
        $permissions = $this->getAllPermissions($permissions);
        if($permissions==null) {
            return $this;
        }
        $this->permissions()->saveMany($permission);
        return $this;
    }

    public function permissions(){
        return $this->belongsTomany(Permission::class,'users_permission');

    }
    public function roles(){
        return $this->belongsTomany(Roles::class,'users_roles');
        
    }
}