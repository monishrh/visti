<?php

namespace Modules\Coupons\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use Translatable;

    protected $table = 'coupons__coupons';
    public $translatedAttributes = [];
    protected $fillable = ['id',
'c_name',
'c_desc',
'c_discount',
'status'];
}
