<?php

namespace Modules\Towing\Entities;

use Illuminate\Database\Eloquent\Model;

class TnewTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'towing__tnew_translations';
}
