<?php

namespace Modules\Bookings\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Rstore extends Model
{
    use Translatable;

    protected $table = 'bookings__rstores';
    public $translatedAttributes = [];
    protected $fillable = [];
}
