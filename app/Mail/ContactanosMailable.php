<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactanosMailable extends Mailable
{
    use Queueable, SerializesModels;    

    public $data;
    
    public $subject = "Información Uniformes";

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        //
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {        
        //dd($this->data);
        $correo = $this->data['correo'];
        $nombre = $this->data['data'][0]->nomEmpleado;   
        $fechaRegistro    = $this->data['data'][0]->fechaRegistro; 
        $plaza = $this->data['data'][0]->plaza;  
        return $this->view('emails.contactanos')
        ->with('data', $this->data)
        ->with('nombre', $nombre)        
        ->with('correo', $correo)
        ->with('fechaRegistro', $fechaRegistro)
        ->with('plaza', $plaza);
    }
}
