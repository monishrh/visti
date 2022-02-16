<?php

namespace Modules\Bookings\Entities;

use Illuminate\Database\Eloquent\Model;

class PickupdTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'bookings__pickupd_translations';
}
