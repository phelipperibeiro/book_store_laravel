<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{

    protected $fillable = [
        'name',
        'description',
    ];

    /* method responsavel pelo relacionamento de tabelas */

    public function roles($param)
    {
        $this->belongsToMany(Roles::class);
    }

}
