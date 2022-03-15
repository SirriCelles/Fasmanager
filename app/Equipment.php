<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    //
    protected $table ='equipment';

    public function etype() 
    {
        return $this->belongsTo('App\EquipmentType', 'equipmentType_id');
    }

    public function campus()
    {
        return $this->belongsToMany('App\Campus','campus_equipment')->withTimestamps();
    }

    public function roomtypes()
    {
        return $this->belongsToMany('App\RoomType', 'equipment_roomtype');
    }
    

}
