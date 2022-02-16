<?php

namespace Modules\Banner\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use Translatable;

    protected $table = 'banner__banners';
    public $translatedAttributes = [];
    protected $fillable = ['id','image1','status'];
}
