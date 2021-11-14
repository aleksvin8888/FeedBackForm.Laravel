<?php


namespace App\Traits\Roles;


use App\Models\Role;

trait HasRolesTrait
{

    public function hasRole( ... $roles ) {

        foreach ($roles as $role) {
            if ($this->roles->contains('slug', $role)) {
                return true;
            }
        }
        return false;
    }

    public function roles() {

        return $this->belongsToMany(Role::class,'users_roles');

    }
}
