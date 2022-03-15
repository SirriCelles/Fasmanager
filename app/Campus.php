<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campus extends Model
{
    //
    protected $table = 'campus';
    protected $primaryKey = 'campus_id';
    protected $fillable = ['campus_name', 'location', 'description'];
    

    //get blocks for a campus. that is defineing a has many relationship.
     public function blocks() 
     {
         return $this->hasMany('App\Block', 'campus_fk_id');
     }
    
     public function assets() 
     {
         return $this->hasMany('App\Asset', 'campus_fk_id');
     } 

     public function equipment()
    {
        return $this->belongsToMany('App\Equipment','campus_equipment')->withTimestamps();
    }
}
