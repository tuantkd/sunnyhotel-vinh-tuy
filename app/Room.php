<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $table = 'rooms';
    protected $primaryKey = 'id';

    protected $fillable = ['id','category_id','room_name','room_image',
    'room_price','room_describe','room_status'];

    public $timestamps = true;

    public function Categoryroom()
    {
        return $this->belongsTo('App\Categoryroom');
    }

    public function BookDetail()
    {
        return $this->hasMany('App\BookDetail');
    }

    public function BookDetailTemp()
    {
        return $this->hasMany('App\BookDetailTemp');
    }

    public function RatingStar()
    {
        return $this->hasMany('App\RatingStar');
    }

    public function Save_bookroom()
    {
        return $this->hasMany('App\Save_bookroom');
    }
}
