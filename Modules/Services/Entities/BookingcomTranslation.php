<?php

namespace Modules\Services\Entities;

use Illuminate\Database\Eloquent\Model;

class BookingcomTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'services__bookingcom_translations';
}
