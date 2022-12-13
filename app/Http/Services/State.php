<?php

namespace App\Http\Services;

 class State{

    public function get(){
        $data =['Recibido','Procesando','Entregado','Terminado'];

        return $data;
    }
 }
?>