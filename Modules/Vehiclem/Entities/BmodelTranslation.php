<?php

namespace Modules\Vehiclem\Entities;

use Illuminate\Database\Eloquent\Model;

class BmodelTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'vehiclem__bmodel_translations';
}
