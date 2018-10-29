<?php

namespace Modules\Bill\Entities;

use Illuminate\Database\Eloquent\Model;

class Cashier extends Model
{
    protected $fillable = ["employee_id"];
    
    public $timestamps = false;
    public function employee(){
        return $this->belongsTo('Modules\User\Entities\Employee');
    }
    
}
