<?php

namespace Modules\Appointment\Emails;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Modules\User\Entities\User;
use Modules\Appointment\Entities\Appointment;

class AppointmentMadeMail extends Mailable
{
    public $patient=null;
    public $doctor=null;
    public $appointment=null;
    
    use Queueable, SerializesModels;
    
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $patient,User $doctor,  Appointment $appointment)
    {
        $this->patient=$patient;
        $this->doctor=$doctor;
        $this->appointment=$appointment;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('appointment::emails.appointmentMadeMail',['patient'=>$this->patient,'doctor'=>$this->doctor,'appointment'=>$this->appointment]);
    }
}
