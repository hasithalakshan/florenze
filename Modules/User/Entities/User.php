<?php

namespace Modules\User\Entities;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = ["fname","lname","gender","dob","street","city","role","state_id"];
    
    public function state(){
        return $this->belongsTo('Modules\General\Entities\State');
    }
    public function role(){
        return $this->hasOne('Modules\General\Entities\Role');
    }
    public function telephones(){
        return $this->hasMany('Modules\General\Entities\Telephone','user_id');
    }
    public function emails(){
        return $this->hasMany('Modules\General\Entities\Email','user_id');
    }
    public function employee(){
        return $this->hasOne('Modules\User\Entities\Employee');
    }
    public function patient(){
        return $this->hasOne('Modules\User\Entities\Patient');
    }
}
