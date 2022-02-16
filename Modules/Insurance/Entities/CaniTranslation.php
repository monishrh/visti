<?php

namespace Modules\Insurance\Entities;

use Illuminate\Database\Eloquent\Model;

class CaniTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'insurance__cani_translations';
}
