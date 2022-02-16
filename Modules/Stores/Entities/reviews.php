<?php

namespace Modules\Stores\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class reviews extends Model
{
    use Translatable;

    protected $table = 'stores__reviews';
    public $translatedAttributes = [];
    protected $fillable = ['id','store_id','user_id','rating','review'];
      public function user()
	{
	    return $this->belongsTo("Modules\User\Entities\Sentinel\User","user_id");
	}
}




