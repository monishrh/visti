<?php

namespace Modules\Bookings\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Rdel extends Model
{
    use Translatable;

    protected $table = 'bookings__rdels';
    public $translatedAttributes = [];
    protected $fillable = [];
}
