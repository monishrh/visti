<?php

namespace Modules\Bookings\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Pickup extends Model
{
    use Translatable;

    protected $table = 'bookings__pickups';
    public $translatedAttributes = [];
    protected $fillable = [];
}
