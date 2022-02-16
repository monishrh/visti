<?php

namespace Modules\Bookings\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Accepted extends Model
{
    use Translatable;

    protected $table = 'bookings__accepteds';
    public $translatedAttributes = [];
    protected $fillable = [];
}
