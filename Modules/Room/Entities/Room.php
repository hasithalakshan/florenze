<?php

namespace Modules\Room\Entities;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $primaryKey="room_no";
    public $incrementing=false;
    
    protected $fillable = ["room_no","location"];
    
    public function rosters(){
        return $this->hasMany('Modules\Room\Entities\Roster','room_no');
    }
}
