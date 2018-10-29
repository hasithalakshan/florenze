<?php

namespace Modules\GeneralAdministration\Entities;

use Illuminate\Database\Eloquent\Model;

class WorkPeriod extends Model
{
    public $incrementing=false;

    protected $fillable = ["id","period_start","period_end"];
    public $timestamps = false;
}
