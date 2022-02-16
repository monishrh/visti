<?php

namespace Modules\Vehiclem\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Bmodel extends Model
{
    use Translatable;

    protected $table = 'vehiclem__bmodels';
    public $translatedAttributes = [];
    protected $fillable = ['id','brand_id','model_name','status'];
    
}
