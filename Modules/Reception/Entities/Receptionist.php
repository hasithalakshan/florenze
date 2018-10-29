<?php

namespace Modules\Reception\Entities;

use Illuminate\Database\Eloquent\Model;

class Receptionist extends Model
{
    protected $fillable = ["employee_id"];
    
    public $timestamps = false;
    public function employee(){
        return $this->belongsTo('Modules\User\Entities\Employee');
    }
    public function visit_appointments(){
        return $this->hasMany('Modules\Appointment\Entities\VisitAppointment');
    }
}
