<?php

namespace Modules\Appointment\Entities;

use Illuminate\Database\Eloquent\Model;

class VisitAppointment extends Model
{
    protected $fillable = ["appointment_id","receptionist_id"];
    
    public $timestamps = false;
    public function appointment(){
        return $this->belongsTo('Modules\Appointment\Entities\Appointment');
    }
    public function receptionist(){
        return $this->belongsTo('Modules\Reception\Entities\Receptionist');
    }
    public function appointment_bill(){
        return $this->hasOne('Modules\Appointment\Entities\AppointmentBill');
    }
}
