<?php

namespace Modules\Stores\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Stores extends Model
{
    use Translatable;

    protected $table = 'stores__stores';
    public $translatedAttributes = [];
    protected $fillable = ['id','vendor_id','city_id','area_id',
'gaurage_name',
'address',
'lat',
'longi',
'icon',
'banner',
'price',
'phone_number',
'aphone_number',
'first_name',
'last_name',
'email',
'password'];

}


