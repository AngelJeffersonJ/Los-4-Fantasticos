<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Producto;

class OrdenCompraMail extends Mailable
{
    use Queueable, SerializesModels;

    public $producto;
    public $cantidad;
    public $proveedorData;

    /**
     * Crea una nueva instancia del mensaje.
     *
     * @param Producto $producto
     * @param int $cantidad
     * @param array $proveedorData
     */
    public function __construct(Producto $producto, $cantidad, $proveedorData)
    {
        $this->producto = $producto;
        $this->cantidad = $cantidad;
        $this->proveedorData = $proveedorData;
    }

    /**
     * Construye el mensaje de correo.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Nueva Orden de Compra')
                    ->view('emails.orden_compra');
    }
}
