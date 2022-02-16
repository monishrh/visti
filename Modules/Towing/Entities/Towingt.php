<?php

namespace Modules\Towing\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Towingt extends Model
{
    use Translatable;

    protected $table = 'towing__towingts';
    public $translatedAttributes = [];
    protected $fillable = ['id',
'typename',
'img',
'ratecard',
'bprice',
'price1_10',
'price10_15',
'price15_20',
'price20_25',
'price25'];
}
