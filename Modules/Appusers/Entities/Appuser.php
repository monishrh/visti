<?php

namespace Modules\Appusers\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Appuser extends Model
{
    use Translatable;

    protected $table = 'appusers__appusers';
    public $translatedAttributes = [];
    protected $fillable = ['id',
'user_id',
'first_name',
'last_name',
'phone',
'email',
'password',
'status'];
}
