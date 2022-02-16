<?php

namespace Modules\Bookings\Entities;

use Illuminate\Database\Eloquent\Model;

class CanceledTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'bookings__canceled_translations';
}
