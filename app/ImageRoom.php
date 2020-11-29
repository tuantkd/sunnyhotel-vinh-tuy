<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImageRoom extends Model
{
    protected $table = 'image_rooms';
    protected $primaryKey = 'id';

    protected $fillable = ['id','room_id ','room_image'];

    public $timestamps = true;

    public function Room()
    {
        return $this->belongsTo('App\Room');
    }
}
