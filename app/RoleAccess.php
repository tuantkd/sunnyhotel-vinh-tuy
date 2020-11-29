<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoleAccess extends Model
{
    protected $table = 'role_accesses';
    protected $primaryKey = 'id';

    protected $fillable = ['id','role_name'];

    public $timestamps = true;


    public function User()
    {
        return $this->hasMany('App\User');
    }
}
