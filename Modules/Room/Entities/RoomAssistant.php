<?php

namespace Modules\Room\Entities;

use Illuminate\Database\Eloquent\Model;

class RoomAssistant extends Model
{
    protected $fillable = ["employee_id"];
    
    public $timestamps = false;
    public function employee(){
        return $this->belongsTo('Modules\User\Entities\Employee');
    }
    public function rosters(){
        return $this->hasMany('Modules\Room\Entities\Roster');
    }
}
