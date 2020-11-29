<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookDetail extends Model
{
    protected $table = 'book_details';
    protected $primaryKey = 'id';

    protected $fillable = ['id','bookroom_id','room_id','book_details_total_price','number_person'];

    public $timestamps = true;

    public function BookRoom()
    {
        return $this->belongsTo('App\BookRoom');
    }

    public function Room()
    {
        return $this->belongsTo('App\Room');
    }
}
