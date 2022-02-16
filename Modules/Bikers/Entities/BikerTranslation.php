<?php

namespace Modules\Bikers\Entities;

use Illuminate\Database\Eloquent\Model;

class BikerTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'bikers__biker_translations';
}
