<?php

namespace Modules\Stores\Entities;

use Illuminate\Database\Eloquent\Model;

class StoresTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'stores__stores_translations';
}
