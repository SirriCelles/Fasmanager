<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EquipmentType extends Model
{
    //
    protected $table = 'etype';
    protected $fillable = ['type', 'subtype'];

    public function equipment() 
    {
        return $this->hasMany('App\Equipment', 'equipmentType_id');
    }
}
