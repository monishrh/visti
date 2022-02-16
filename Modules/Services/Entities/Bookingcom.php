<?php

namespace Modules\Services\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Bookingcom extends Model
{
    use Translatable;

    protected $table = 'services__bookingcoms';
    public $translatedAttributes = [];
    protected $fillable = [];
}
