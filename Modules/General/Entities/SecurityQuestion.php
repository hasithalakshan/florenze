<?php

namespace Modules\General\Entities;

use Illuminate\Database\Eloquent\Model;

class SecurityQuestion extends Model
{
    protected $fillable = ["question"];
    
    public $timestamps = false;
    public function patients() {
        return $this->belongsToMany('Modules\User\Entities\Patient');
    }
}
