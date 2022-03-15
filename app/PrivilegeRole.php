<?php

namespace App;

use App\Traits\HasCompositePrimaryKey;
use Illuminate\Database\Eloquent\Model;


class PrivilegeRole extends Model
{
    //
    protected $table = 'privilege_role';
    protected $primaryKey = ['role_id','privilege_id'];
    protected $fillable = ['role_id', 'privilege_id'];
    public $incrementing = false;

   
}
