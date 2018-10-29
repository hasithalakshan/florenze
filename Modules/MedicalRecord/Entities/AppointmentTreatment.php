<?php

namespace Modules\MedicalRecord\Entities;

use Illuminate\Database\Eloquent\Model;

class AppointmentTreatment extends Model
{
    protected $fillable = ["appointment_id","medical_record_id"];
    
    public $timestamps = false;
    public function appointment(){
        return $this->belongsTo('Modules\Appointment\Entities\Appointment');
    }
    public function medical_record(){
        return $this->belongsTo('Modules\MedicalRecord\Entities\MedicalRecord');
    }
}
