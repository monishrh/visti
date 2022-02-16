<?php

namespace Modules\Insurance\Entities;

use Illuminate\Database\Eloquent\Model;

class OniTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'insurance__oni_translations';
}
