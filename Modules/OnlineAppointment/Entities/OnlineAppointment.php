<?php

namespace Modules\OnlineAppointment\Entities;

use Illuminate\Database\Eloquent\Model;

class OnlineAppointment extends Model
{
    protected $fillable = ["appointment_id","payment_method"];
    
    public $timestamps = false;
    public function appointment(){
        return $this->belongsTo('Modules\Appointment\Entities\Appointment');
    }
}
