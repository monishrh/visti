<?php

namespace Modules\Services\Entities;

use Illuminate\Database\Eloquent\Model;

class ServiceTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'services__service_translations';
}
