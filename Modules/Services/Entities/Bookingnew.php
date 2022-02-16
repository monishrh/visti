<?php

namespace Modules\Services\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Bookingnew extends Model
{
    use Translatable;

    protected $table = 'services__bookingnews';
    public $translatedAttributes = [];
    protected $fillable = ['id',
'user_id',
'service_id',

'bike_number',
'bikerpickup',
'sdate',
'stime',
'address',
'lat',
'long',
'plat',
'plong',
'payment',
's_charge',
'distance',
'review',
'rating',
'payment_status',
'status','llat','llong'];
 public function user()
	{
	    return $this->belongsTo("Modules\User\Entities\Sentinel\User","user_id");
	}
	
	
	  public function bikerpickup1()
	{
	    return $this->belongsTo("Modules\Bikers\Entities\Biker","bikerpickup");

    }
 }
