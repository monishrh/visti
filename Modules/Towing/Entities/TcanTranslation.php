<?php

namespace Modules\Towing\Entities;

use Illuminate\Database\Eloquent\Model;

class TcanTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'towing__tcan_translations';
}
