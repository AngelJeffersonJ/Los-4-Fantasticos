<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SugerenciaProveedorMail extends Mailable
{
    use Queueable, SerializesModels;

    public $proveedores; // Lista de proveedores sugeridos

    /**
     * Crea una nueva instancia del correo.
     */
    public function __construct($proveedores)
    {
        $this->proveedores = $proveedores;
    }

    /**
     * Construye el mensaje del correo.
     */
    public function build()
    {
        return $this->from('jeffersonreincarnation@gmail.com', 'Ferretería Proveedores')
                    ->subject('📢 Sugerencias de Proveedores - Ferretería')
                    ->view('emails.sugerencia_proveedor') // Vista del correo
                    ->with([
                        'proveedores' => $this->proveedores
                    ]);
    }
}
