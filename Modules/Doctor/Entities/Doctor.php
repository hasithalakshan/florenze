<?php

namespace Modules\Doctor\Entities;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $fillable = ["type","speciality","appointment_price","employee_id","room_no"];
    
    public $timestamps = false;
    public function employee(){
        return $this->belongsTo('Modules\User\Entities\Employee');
    }
    public function appointments(){
        return $this->hasMany('Modules\Appointment\Entities\Appointment');
    }
    public function rosters(){
        return $this->hasMany('Modules\GeneralAdministration\Entities\Roster');
    }
}
