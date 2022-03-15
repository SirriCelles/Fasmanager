<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
    protected $fillable =['name', 'slug', 'description'];
    public function users()
    {
        return $this->hasMany('App\User');
    }

    public function privileges()
    {
        return $this->belongsToMany('App\Privilege','privilege_role')->withTimestamps();
    }
}
