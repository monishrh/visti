<?php

namespace Modules\Services\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use Translatable;

    protected $table = 'services__services';
    public $translatedAttributes = [];
    protected $fillable = ['id',
'name',
'description',
'minimum_charge',
'service_charge'];
}
