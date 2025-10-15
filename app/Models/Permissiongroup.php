<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permissiongroup extends Model
{
    //

    public function permissions()
    {
        return $this->hasMany(Permission::class, 'group_id');
    }
}
