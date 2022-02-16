<?php

namespace Modules\Appusers\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class wallet extends Model
{
    use Translatable;

    protected $table = 'appusers__wallets';
    public $translatedAttributes = [];
    protected $fillable = ['id',
'user_id',
'type',
'amount'];
  public function user()
	{
	    return $this->belongsTo("Modules\User\Entities\Sentinel\User","user_id");
	}
}
