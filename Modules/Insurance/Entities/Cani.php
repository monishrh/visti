<?php

namespace Modules\Insurance\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Cani extends Model
{
    use Translatable;

    protected $table = 'insurance__canis';
    public $translatedAttributes = [];
    protected $fillable = [];
}
