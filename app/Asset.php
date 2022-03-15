<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Asset extends Model
{
    //
    use SoftDeletes;
    protected $fillable = [];

    protected $dates = ['deleted_at'];

    public function campus()
    {
        return $this->belongsTo('App\Campus', 'campus_fk_id');
    }
}
