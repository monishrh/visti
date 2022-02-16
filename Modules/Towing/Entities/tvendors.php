<?php

namespace Modules\Towing\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class tvendors extends Model
{
    use Translatable;

    protected $table = 'towing__tvendors';
    public $translatedAttributes = [];
    protected $fillable = ['id',
'user_id',
'city_id',
'name',
'address',
'phone',
'password',
'email',
'doc',
'status'];
}
