<?php

namespace Modules\Bill\Entities;

use Illuminate\Database\Eloquent\Model;

class AppointmentBill extends Model
{
    protected $fillable = ["payment_amount","appointment_id","xray_fees","laboratory_fees","concession"];
    
    public $timestamps = false;
    public function appointment(){
        return $this->belongsTo('Modules\Appointment\Entities\Appointment');
    }
    
}
