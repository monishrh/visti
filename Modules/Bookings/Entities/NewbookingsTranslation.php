<?php

namespace Modules\Bookings\Entities;

use Illuminate\Database\Eloquent\Model;

class NewbookingsTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'bookings__newbookings_translations';
}
