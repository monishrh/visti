<?php

namespace Modules\Bookings\Entities;

use Illuminate\Database\Eloquent\Model;

class AcceptedTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'bookings__accepted_translations';
}
