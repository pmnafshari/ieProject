<?php

namespace App\Mail;

use App\Models\admin\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class forgetpassMail extends Mailable
{
    use Queueable, SerializesModels;
public $password;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($password)
    {
        $this->password = $password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from("rivas20system@gmail.com")
            ->view('admin.mail.forgetpass');    }
}
