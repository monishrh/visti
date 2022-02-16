<?php

namespace Modules\Bookings\Entities;

use Illuminate\Database\Eloquent\Model;

class DelvrdTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'bookings__delvrd_translations';
}
