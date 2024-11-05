<?php

namespace App\Services;

use Illuminate\Support\Facades\Session;

class NotificationService
{
    public function notify($message, $redirectTo)
    {
        // Guardar el mensaje en la sesión
        Session::flash('notification', $message);
        // Redirigir a la ruta especificada
        return redirect($redirectTo);
    }
}
