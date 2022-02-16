<?php

namespace Modules\Towing\Entities;

use Illuminate\Database\Eloquent\Model;

class TowingtTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'towing__towingt_translations';
}
