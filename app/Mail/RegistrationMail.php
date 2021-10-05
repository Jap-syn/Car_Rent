<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class RegistrationMail extends Mailable
{
    use Queueable, SerializesModels;
    public $registration;
    public $loginUserName;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($registration,$loginUserName)
    {
        //
        $this->registration = $registration;
        $this->loginUserName = $loginUserName;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('backend.email.registration');
    }
}
