<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Welcome extends Mailable
{
    use Queueable, SerializesModels;

    public $password;

    /**
     * Create a new message instance.
     *
     * @param User $user
     * @param $password
     */
    public function __construct($password)
    {
        $this->password=$password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.welcome ');
    }
}
