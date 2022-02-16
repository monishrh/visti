<?php

namespace Modules\Towing\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Tcom extends Model
{
    use Translatable;

    protected $table = 'towing__tcoms';
    public $translatedAttributes = [];
    protected $fillable = [];
}
