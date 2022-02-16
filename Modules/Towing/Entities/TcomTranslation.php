<?php

namespace Modules\Towing\Entities;

use Illuminate\Database\Eloquent\Model;

class TcomTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'towing__tcom_translations';
}
