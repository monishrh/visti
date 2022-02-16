<?php

namespace Modules\Bookings\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Newbookings extends Model
{
    use Translatable;

    protected $table = 'bookings__newbookings';
    public $translatedAttributes = [];
    protected $fillable = [
   ' id',
'user_id',
'store_id',
'brand',
'model',
'bike_number',
'date1',
'time1',
'bikerpickup',
'image1',
'image2',
'image3',
'image4',
'bikerdrop',
'address',
'lat',
'long',
'payment',
'payment_status',
'sinstruction',
'review',
'rating','status','ostatus','kmr','billimage','billpayment','kmrd','otp','llat','llong'];
  public function user()
	{
	    return $this->belongsTo("Modules\User\Entities\Sentinel\User","user_id");
	}
	  public function store()
	{
	    return $this->belongsTo("Modules\Stores\Entities\Stores","store_id");
	}
	  public function brand1()
	{
	    return $this->belongsTo("Modules\Vehiclem\Entities\Brand","brand");
	}
	  public function model1()
	{
	    return $this->belongsTo("Modules\Vehiclem\Entities\Bmodel","model");
	}
	  public function bikerpickup1()
	{
	    return $this->belongsTo("Modules\Bikers\Entities\Biker","bikerpickup");
	}
	  public function bikerdrop1()
	{
	    return $this->belongsTo("Modules\Bikers\Entities\Biker","bikerdrop");
	}
}
	
	