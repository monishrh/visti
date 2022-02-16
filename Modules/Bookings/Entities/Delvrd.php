<?php

namespace Modules\Bookings\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Delvrd extends Model
{
    use Translatable;

    protected $table = 'bookings__delvrds';
    public $translatedAttributes = [];
    protected $fillable = [];
}
