<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Privilege extends Model
{
    //
    protected $fillable = ['name', 'icon', 'path', 'status', 'description', 'pslug'];

    public function roles()
    {
        return $this->belongsToMany('App\Role', 'privilege_role')->withTimestamps();
    }
}
 