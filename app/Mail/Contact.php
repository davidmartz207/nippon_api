<?php

namespace serendipia\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Contact extends Mailable
{
    use Queueable, SerializesModels;

    protected $asunto;
    protected $emisor;
    protected $nombre;
    protected $telefono;
    protected $contenido;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($asunto,$emisor,$nombre,$telefono,$contenido)
    {
        $this->asunto    = $asunto;
        $this->emisor    = $emisor;
        $this->nombre    = $nombre;
        $this->telefono  = $telefono;
        $this->contenido = $contenido;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.contacto')->from($this->emisor)->with(['nombre'=>$this->nombre,'telefono'=>$this->telefono,'contenido'=>$this->contenido,'email'=>$this->emisor, 'asunto'=>$this->asunto]);
    }
}
