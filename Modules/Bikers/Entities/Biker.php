<?php

namespace Modules\Bikers\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Biker extends Model
{
    use Translatable;

    protected $table = 'bikers__bikers';
    public $translatedAttributes = [];
    protected $fillable = ['id',
'user_id',
'city_id',
'area_id',
'first_name',
'last_name',
'phone',
'email',
'password',
'status','dl','dl_img'];
}
