<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{
    //
    protected  $table = 'roomtypes';
    protected $primaryKey = 'room_type_id';

    protected $fillable = ['room_type', 'description'];

    public function rooms()
    {
        return $this->hasMany('App\Room', 'roomtype_fk_id');
    }

    public function equipment()
    {
        return $this->belongsToMany('App\Equipment', 'equipment_roomtype');
    }

}
