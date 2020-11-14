<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SentPassword extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
     public $g_pass = "";
    public function __construct($auto_password)
    {
        $this->g_pass = $auto_password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Account Information from Boighor.com')
            ->from('info@boighor.com','Boighor.com')
            ->markdown('mail.sentpassword', [
              "g_pass" => $this->g_pass
        ]);
    }
}
