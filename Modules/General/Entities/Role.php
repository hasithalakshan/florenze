<?php

namespace Modules\General\Entities;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ["role"];
    
    public $timestamps = false;
    public function users(){
        return $this->hasMany('Modules\User\Entities\User');
    }
}
