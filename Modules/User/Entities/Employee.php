<?php

namespace Modules\User\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;

class Employee extends Model implements Authenticatable
{
    protected $fillable = ["user_id","password","remember_token","profile_pic","disabled"];
    protected $hidden=['password','remember_token'];


    public $timestamps = false;
    public function user(){
        return $this->belongsTo('Modules\User\Entities\User');
    }
    public function roster(){
        return $this->hasOne('Modules\GeneralAdministration\Entities\Roster');
    }
    public function administrator(){
        return $this->hasOne('Modules\User\Entities\Administrator');
    }
    public function doctor(){
        return $this->hasOne('Modules\Doctor\Entities\Doctor');
    }
    public function receptionist(){
        return $this->hasOne('Modules\Reception\Entities\Receptionist');
    }
    public function cashier(){
        return $this->hasOne('Modules\Bill\Entities\Cashier');
    }
    public function room_assistant(){
        return $this->hasOne('Modules\Room\Entities\RoomAssistant');
    }
    
    
    //auth methods
    
    public function getAuthIdentifierName()
    {
        return $this->getKeyName();
    }

    /**
     * Get the unique identifier for the user.
     *
     * @return mixed
     */
    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->password;
    }

    /**
     * Get the token value for the "remember me" session.
     *
     * @return string
     */
    public function getRememberToken()
    {
        return $this->{$this->getRememberTokenName()};
    }

    /**
     * Set the token value for the "remember me" session.
     *
     * @param  string  $value
     * @return void
     */
    public function setRememberToken($value)
    {
        $this->{$this->getRememberTokenName()} = $value;
    }

    /**
     * Get the column name for the "remember me" token.
     *
     * @return string
     */
    public function getRememberTokenName()
    {
        return 'remember_token';
    }

}
