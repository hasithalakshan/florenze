<?php

namespace Modules\General\Entities;

use Illuminate\Database\Eloquent\Model;

class Telephone extends Model
{
    protected $primaryKey = "tel_no";
    protected $fillable = ["tel_no","user_id"];
    
    public function user(){
        return $this->belongsTo('Modules\User\Entities\User');
    }
}
