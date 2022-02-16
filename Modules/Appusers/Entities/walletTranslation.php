<?php

namespace Modules\Appusers\Entities;

use Illuminate\Database\Eloquent\Model;

class walletTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'appusers__wallet_translations';
}
