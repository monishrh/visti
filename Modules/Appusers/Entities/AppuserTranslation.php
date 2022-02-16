<?php

namespace Modules\Appusers\Entities;

use Illuminate\Database\Eloquent\Model;

class AppuserTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'appusers__appuser_translations';
}
