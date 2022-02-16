<?php

namespace Modules\Bookings\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Canceled extends Model
{
    use Translatable;

    protected $table = 'bookings__canceleds';
    public $translatedAttributes = [];
    protected $fillable = [];
}
