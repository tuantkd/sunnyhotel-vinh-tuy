<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryService extends Model
{
    protected $table = 'category_services';
    protected $primaryKey = 'id';

    protected $fillable = ['id','category_name'];

    public $timestamps = true;

    public function Service()
    {
        return $this->hasMany('App\Service');
    }
}
