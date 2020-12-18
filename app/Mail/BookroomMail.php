<?php

namespace App\Mail;

use App\BookRoom;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class BookroomMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $bookroom;

    public function __construct(BookRoom $bookroom)
    {
        $this->bookroom = $bookroom;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('vinhtuy290998@gmail.com')
            ->view('mail.send_mail');
    }
}
