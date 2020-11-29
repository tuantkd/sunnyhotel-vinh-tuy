<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'services';
    protected $primaryKey = 'id';

    protected $fillable = ['id','category_service_id','service_title','service_describe'];

    public $timestamps = true;

    public function ImageService()
    {
        return $this->hasMany('App\ImageService');
    }

    public function CategoryService()
    {
        return $this->belongsTo('App\CategoryService');
    }

}
