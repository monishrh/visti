<?php

namespace Modules\Insurance\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Oni extends Model
{
    use Translatable;

    protected $table = 'insurance__onis';
    public $translatedAttributes = [];
    protected $fillable = [];
}
