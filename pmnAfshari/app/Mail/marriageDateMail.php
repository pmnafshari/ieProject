<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class marriageDateMail extends Mailable
{
    use Queueable, SerializesModels;
    public $text,$discount,$start_date,$end_date;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($text,$discount,$start_date,$end_date)
    {
        $this->text=$text;
        $this->discount=$discount;
        $this->start_date=$start_date;
        $this->end_date=$end_date;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from("rivas20system@gmail.com")
            ->view('admin.mail.marritalDate');    }
}
