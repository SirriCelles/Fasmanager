<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Block extends Model
{
    //

    protected $table = 'blocks';
    protected $primaryKey = 'block_id';
    protected $fillable = ['block_name', 'numof_rooms', 'campus_fk_id'];

    public function campus()
    {
        return $this->belongsTo('App\Campus', 'campus_fk_id');
    }
}
