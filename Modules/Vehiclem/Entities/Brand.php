<?php

namespace Modules\Vehiclem\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use Translatable;

    protected $table = 'vehiclem__brands';
    public $translatedAttributes = [];
    protected $fillable = ['id','brand_name','status'];
}
