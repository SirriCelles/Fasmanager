<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    //
    
    protected $table = 'rooms';
    protected $primaryKey = 'room_id';

    protected $fillable = ['room_name', 'room_capacity', 'description', 'status', 'roomtype_fk_id', 'block_fk_id'];
}
