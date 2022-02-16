<?php

namespace Modules\Bookings\Entities;

use Illuminate\Database\Eloquent\Model;

class RdelTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'bookings__rdel_translations';
}
