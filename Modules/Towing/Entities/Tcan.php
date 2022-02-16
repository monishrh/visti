<?php

namespace Modules\Towing\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Tcan extends Model
{
    use Translatable;

    protected $table = 'towing__tcans';
    public $translatedAttributes = [];
    protected $fillable = [];
}
