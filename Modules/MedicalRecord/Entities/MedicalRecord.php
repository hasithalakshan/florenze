<?php

namespace Modules\MedicalRecord\Entities;

use Illuminate\Database\Eloquent\Model;

class MedicalRecord extends Model
{
    protected $fillable = ["medical_record","description","patient_id"];
    
    public function appointment_treatment(){
        return $this->hasOne('Modules\MedicalRecord\Entities\AppointmentTreatment');
    }
    public function patient(){
        return $this->belongsTo('Modules\User\Entities\Patient');
    }
}
