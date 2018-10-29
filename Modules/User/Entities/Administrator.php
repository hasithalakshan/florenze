<?php

namespace Modules\User\Entities;

use Illuminate\Database\Eloquent\Model;

class Administrator extends Model
{
    protected $fillable = ["type","employee_id"];
    
    public $timestamps = false;
    public function employee(){
        return $this->belongsTo('Modules\User\Entities\Employee');
    }
}
