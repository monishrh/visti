<?php

namespace Modules\Towing\Entities;

use Illuminate\Database\Eloquent\Model;

class TongTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'towing__tong_translations';
}
