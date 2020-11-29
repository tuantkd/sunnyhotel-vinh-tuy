<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RatingStar extends Model
{
    protected $table = 'rating_stars';
    protected $primaryKey = 'id';

    protected $fillable = ['id','user_id','room_id','number_star'];

    public $timestamps = true;

    public function Room()
    {
        return $this->belongsTo('App\Room');
    }

    public function User()
    {
        return $this->belongsTo('App\User');
    }
}
