<?php

namespace Modules\GeneralAdministration\Entities;

use Illuminate\Database\Eloquent\Model;

class Roster extends Model
{
	protected $primaryKey = "id";
		public $incrementing=false;

    protected $fillable = ["id","day","work_period_id","room_no","room_assistant_id","doctor_id"];
    
    public function room_assistant() {
        return $this->belongsTo('Modules\Room\Entities\RoomAssistant');
    }
    public function doctor() {
        return $this->belongsTo('Modules\Doctor\Entities\Doctor');
    }
    public function room() {
        return $this->belongsTo('Modules\Room\Entities\Room','room_no');
    }
    public function work_period() {
        return $this->belongsTo('Modules\GeneralAdministration\Entities\WorkPeriod');
    }
    
    
}
