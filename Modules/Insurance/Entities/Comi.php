<?php

namespace Modules\Insurance\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Comi extends Model
{
    use Translatable;

    protected $table = 'insurance__comis';
    public $translatedAttributes = [];
    protected $fillable = [];
}
