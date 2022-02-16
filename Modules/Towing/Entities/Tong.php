<?php

namespace Modules\Towing\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Tong extends Model
{
    use Translatable;

    protected $table = 'towing__tongs';
    public $translatedAttributes = [];
    protected $fillable = [];
}
