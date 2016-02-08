<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /* method responsavel pelo relacionamento de tabelas */

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function addRole($role)
    {
        if (is_string($role)) {
            return $this->roles()->save(
                Role::whereName($role)->firstOrFail()
            );
        }

        return $this->roles()->save(
            Role::whereName($role->name)->firstOrFail()
        );
    }

    public function revokeRole($role)
    {
        if (is_string($role)) {
            return $this->roles()->detach(
                Role::whereName($role)->firstOrFail()
            );
        }

        return $this->roles()->detach($role);
    }

}
