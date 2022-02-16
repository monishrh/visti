<?php

namespace Modules\Bookings\Entities;

use Illuminate\Database\Eloquent\Model;

class RstoreTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'bookings__rstore_translations';
}
