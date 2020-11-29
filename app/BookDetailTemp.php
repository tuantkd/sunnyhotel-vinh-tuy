<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookDetailTemp extends Model
{
    protected $table = 'book_detail_temps';
    protected $primaryKey = 'id';

    protected $fillable = ['id','bookroom_temp_id','room_id','book_details_total_price','number_person'];

    public $timestamps = true;


    public function BookRoomTemp()
    {
        return $this->belongsTo('App\BookRoomTemp');
    }


    public function Room()
    {
        return $this->belongsTo('App\Room');
    }
}
