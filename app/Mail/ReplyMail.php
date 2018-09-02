<?php

namespace App\Mail;

use App\Suggestion;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ReplyMail extends Mailable
{
    use Queueable, SerializesModels;
    public $suggestions;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($suggestions)
    {
        //
     $this->suggestions=$suggestions;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
//        $this->id=$suggestion_id;
//        $suggestion=Suggestion::where('id',$suggestion_id)->first();
        return $this->view('emails.response');
    }
}
