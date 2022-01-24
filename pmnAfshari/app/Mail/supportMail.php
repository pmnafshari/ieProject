<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class supportMail extends Mailable
{
    use Queueable, SerializesModels;
public $email;
public $text;
    public $file;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email,$text,$file)
    {
        $this->email=$email;
        $this->text=$text;
        $this->file=$file;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from("rivas20system@gmail.com")
            ->view('admin.mail.support')
            ->attach(public_path($this->file), [
                'as' => 'name',
//                'mime' => 'application/pdf',
            ]);
    }
}
