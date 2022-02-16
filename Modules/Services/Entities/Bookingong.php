<?php

namespace Modules\Services\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Bookingong extends Model
{
    use Translatable;

    protected $table = 'services__bookingongs';
    public $translatedAttributes = [];
    protected $fillable = [];
}
