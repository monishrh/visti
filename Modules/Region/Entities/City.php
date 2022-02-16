<?php

namespace Modules\Region\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use Translatable;

    protected $table = 'region__cities';
    public $translatedAttributes = [];
    protected $fillable = ['id','city_id','city_name','status'];
}
