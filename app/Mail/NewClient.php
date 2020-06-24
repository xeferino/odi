<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Client;

class NewClient extends Mailable
{
    use Queueable, SerializesModels;

    public $client;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Client $client)
    {
        $this->client = $client;        
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject("Registro Web.")->markdown('emails.store.newclient', compact('client'));
    }
}
