<?php

namespace Modules\Worktimings\Entities;

use Illuminate\Database\Eloquent\Model;

class TimingTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'worktimings__timing_translations';
}
