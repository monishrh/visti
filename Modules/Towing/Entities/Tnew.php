<?php

namespace Modules\Towing\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Tnew extends Model
{
    use Translatable;

    protected $table = 'towing__tnews';
    public $translatedAttributes = [];
    protected $fillable = ['id',
'user_id',
'vendor_id',
'type',
'payment',
'paddress',
'plat',
'plong',
'daddress',
'dlat',
'dlong',
'ptime',
'dtime',
'bdate',
'rc',
'status'];
 public function user()
	{
	    return $this->belongsTo("Modules\User\Entities\Sentinel\User","user_id");
	}
	 public function type()
	{
	    return $this->belongsTo("Modules\Towing\Entities\Towingt","type");
	}
	 public function vendor()
	{
	    return $this->belongsTo("Modules\Towing\Entities\Tvendors","vendor_id");
	}
}
