<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VotePlaced extends Mailable
{
    use Queueable, SerializesModels;

    public $email;
    public $votes;

    public function __construct($email, $votes)
    {
        $this->email = $email;
        $this->votes = $votes;
    }

    public function build()
    {
        return $this->markdown('emails.votePlaced')
                    ->with([
                        'user' => $this->email,
                        'votes' => $this->votes,
                    ]);
    }
}
