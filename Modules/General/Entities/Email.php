<?php

namespace Modules\General\Entities;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    protected $primaryKey = "email";
    public $incrementing=false;
    protected $fillable = ["email","user_id"];
    
    public function user(){
        return $this->belongsTo('Modules\User\Entities\User');
    }   
}
