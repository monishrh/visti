<?php

namespace Modules\Stores\Entities;

use Illuminate\Database\Eloquent\Model;

class reviewsTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'stores__reviews_translations';
}
