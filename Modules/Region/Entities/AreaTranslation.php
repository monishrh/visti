<?php

namespace Modules\Region\Entities;

use Illuminate\Database\Eloquent\Model;

class AreaTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'region__area_translations';
}
