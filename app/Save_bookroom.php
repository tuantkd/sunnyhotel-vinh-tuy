<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Save_bookroom extends Model
{
    protected $table = 'save_bookrooms';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id','room_id','bookroom_date_received','bookroom_date_pay',
        'bookroom_number_person','bookroom_number_room','bookroom_deposit_money',
        'fullname_customer','phone_customer','address_customer	'
    ];

    public function Room()
    {
        return $this->belongsTo('App\Room');
    }
}
