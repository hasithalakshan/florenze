<?php

namespace Modules\General\Entities;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $fillable = ["name"];

    public $timestamps = false;
    public function users(){
        return $this->hasMany('Modules\User\Entities\User');
    }
}
