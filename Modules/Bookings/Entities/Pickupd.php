<?php

namespace Modules\Bookings\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Pickupd extends Model
{
    use Translatable;

    protected $table = 'bookings__pickupds';
    public $translatedAttributes = [];
    protected $fillable = [];
}
