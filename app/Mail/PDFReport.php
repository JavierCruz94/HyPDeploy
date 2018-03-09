<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PDFReport extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {


        return $this->from('no.reply@hypcs.com')->view('emails.email');
        /*->attach('storage/reporte.pdf', [
            'as' => 'reporte.pdf',
            'mime' => 'application/pdf'
        ]);*/
    }
}
