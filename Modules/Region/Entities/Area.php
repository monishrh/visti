<?php

namespace Modules\Region\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use Translatable;

    protected $table = 'region__areas';
    public $translatedAttributes = [];
    protected $fillable = ['id','city_id','area_name','status'];
  

}
