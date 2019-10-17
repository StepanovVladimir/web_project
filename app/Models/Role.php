<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function users()
    {
        return $this->hasMany(User::class, 'id_role', 'id');
    }
    
    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'roles_has_permissions', 'id_role', 'id_permission');
    }
}
