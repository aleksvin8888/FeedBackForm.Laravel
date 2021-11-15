<?php

namespace App\Mail\User;

use App\Models\FeedBack;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FeedBackMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var FeedBack
     */
    public $feedBack;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct( FeedBack $feedBack)
    {
        $this->feedBack = $feedBack;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.users.feedback');
    }
}
