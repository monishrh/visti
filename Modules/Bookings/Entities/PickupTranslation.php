<?php

namespace Modules\Bookings\Entities;

use Illuminate\Database\Eloquent\Model;

class PickupTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'bookings__pickup_translations';
}
