<?php

namespace Modules\Coupons\Entities;

use Illuminate\Database\Eloquent\Model;

class CouponTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'coupons__coupon_translations';
}
