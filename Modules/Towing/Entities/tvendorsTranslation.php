<?php

namespace Modules\Towing\Entities;

use Illuminate\Database\Eloquent\Model;

class tvendorsTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'towing__tvendors_translations';
}
