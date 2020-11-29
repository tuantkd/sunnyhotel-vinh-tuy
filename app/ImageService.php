<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImageService extends Model
{
    protected $table = 'image_services';
    protected $primaryKey = 'id';

    protected $fillable = ['id','service_id ','service_image'];

    public $timestamps = true;

    public function Service()
    {
        return $this->belongsTo('App\Service');
    }
}
