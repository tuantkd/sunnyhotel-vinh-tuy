<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers';
    protected $primaryKey = 'id';

    protected $fillable = ['id','full_name','customers_phone','customers_address','customes_comment'];

    public $timestamps = true;


    public function BookRoom()
    {
        return $this->hasMany('App\BookRoom');
    }
}
