<?php

namespace Modules\Insurance\Entities;

use Illuminate\Database\Eloquent\Model;

class ComiTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'insurance__comi_translations';
}
