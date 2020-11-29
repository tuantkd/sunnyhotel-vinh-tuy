<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookRoom extends Model
{
    protected $table = 'book_rooms';
    protected $primaryKey = 'id';

    protected $fillable = ['id','bookroom_date_received','bookroom_date_pay','bookroom_number_person',
    'bookroom_number_room','bookroom_deposit_money','fullname_customer','phone_customer','address_customer'];

    public $timestamps = true;

    public function BookDetail()
    {
        return $this->hasMany('App\BookDetail');
    }
}
