<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoryroom extends Model
{
    protected $table = 'categoryrooms';
    protected $primaryKey = 'id';

    protected $fillable = ['id','category_name'];

    public $timestamps = true;

    public function Room()
    {
        return $this->hasMany('App\Room');
    }
}
