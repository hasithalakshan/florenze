<?php

namespace Modules\Appointment\Entities;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = ["date","time","illness","appointment_no","is_over","payment_settled","doctor_id","patient_id"];
    
    public function doctor(){
        return $this->belongsTo('Modules\Doctor\Entities\Doctor');
    }
    public function patient(){
        return $this->belongsTo('Modules\User\Entities\Patient');
    }
    public function visit_appointment(){
        return $this->hasOne('Modules\Appointment\Entities\VisitAppointment');
    }
    public function appointment_treatment(){
        return $this->hasOne('Modules\MedicalRecord\Entities\AppointmentTreatment');
    }
    public function prescription(){
        return $this->hasOne('Modules\MedicalRecord\Entities\Prescription');
    }
    
}