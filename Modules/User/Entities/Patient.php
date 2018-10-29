<?php

namespace Modules\User\Entities;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = ["nationality", "security_answer", "user_id", "security_question_id"];
    
    public $timestamps = false;
    public function user(){
        return $this->belongsTo('Modules\User\Entities\User');
    }
    public function appointments(){
        return $this->hasMany('Modules\Appointments\Entities\Appointment');
    }
    public function medical_records() {
        return $this->hasMany('Modules\MedicalRecord\Entities\MedicalRecord');
    }
    public function security_question() {
        return $this->belongsTo('Modules\General\Entities\SecurityQuestion');
    }
}
