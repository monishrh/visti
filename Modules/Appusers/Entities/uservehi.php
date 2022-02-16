<?php

namespace Modules\Appusers\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class uservehi extends Model
{
    use Translatable;

    protected $table = 'appusers__uservehis';
    public $translatedAttributes = [];
    protected $fillable = ['id','user_id','brand_id','model_id','bike_number'];
      public function brand1()
	{
	    return $this->belongsTo("Modules\Vehiclem\Entities\Brand","brand_id");
	}
	  public function model1()
	{
	    return $this->belongsTo("Modules\Vehiclem\Entities\Bmodel","model_id");
	}
	  public function user()
	{
	    return $this->belongsTo("Modules\User\Entities\Sentinel\User","user_id");
	}
}
