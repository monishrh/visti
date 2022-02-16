<?php

namespace Modules\Insurance\Entities;

use Illuminate\Database\Eloquent\Model;

class NewiTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'insurance__newi_translations';
}
