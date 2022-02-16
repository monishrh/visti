<?php

namespace Modules\Region\Entities;

use Illuminate\Database\Eloquent\Model;

class CityTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'region__city_translations';
}
