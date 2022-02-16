<?php

namespace Modules\Worktimings\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Timing extends Model
{
    use Translatable;

    protected $table = 'worktimings__timings';
    public $translatedAttributes = [];
    protected $fillable = ['id',
'store_id',
'monstart',
'monend',
'tuestart',
'tueend',
'wedstart',
'wedend',
'thustart',
'thuend',
'fristart',
'friend',
'satstart',
'satend',
'sunstart',
'sunend'];
}
