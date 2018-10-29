<?php

namespace Modules\Bill\Entities;

use Illuminate\Database\Eloquent\Model;

class Charge extends Model
{
    protected $fillable = ["category","sub_category","charge"];
    
}
