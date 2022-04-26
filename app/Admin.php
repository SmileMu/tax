<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin  extends  Authenticatable
{
    protected $table ="employee";
    protected $guarded=[];
    public $timestamps = true;

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function hasAbility($permissions)    //products  //mahoud -> admin can't see brands
    {
        $role = $this->role;

        if (!$role) {
            return false;
        }

        foreach ($role->permissions as $permission) {
            if (is_array($permissions) && in_array($permission, $permissions)) {
                return true;
            } else if (is_string($permissions) && strcmp($permissions, $permission) == 0) {
                return true;
            }
        }
        return false;
    }
}
