<?php

namespace Modules\Insurance\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Newi extends Model
{
    use Translatable;

    protected $table = 'insurance__newis';
    public $translatedAttributes = [];
    protected $fillable = ['id',
'user_id',
'vehicletype',
'rc',
'i_status',
'pinsurance',
'amount',
'adate',
'atime',
'pstatus',
'doc',
'status'];
 public function user()
	{
	    return $this->belongsTo("Modules\User\Entities\Sentinel\User","user_id");
	}
}
