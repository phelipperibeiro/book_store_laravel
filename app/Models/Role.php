<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

    protected $fillable = [
        'name',
        'description'
    ];

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    public function addPermission($permission)
    {
        if (is_string($permission)) {
            return $this->permissions()->save(
                            Permission::whereName($permission)->firstOrFail()
            );
        }

        return $this->permissions()->save($permission);
    }

    /* exclui o relacionamento das tabelas */

    public function revokePermission(Permission $permission)
    {
        return $this->permissions()->detach($permission);
    }

}