<?php

namespace IZNOPS;

use IZNOP\Models\QuerysCustom;
use IZNOP\Models\ReclamoComprobante;
use IZNOP\Models\Users;

class ShortcodeController
{

    public function registrarReclamo($atts)
    {

        try {
            // $data = Users::get();
            $comprobantes = ReclamoComprobante::get();
            $ubigeos = QuerysCustom::getUbigeos();
            // dd($ubigeos);
            return view("reclamo.create", compact("comprobantes","ubigeos"));
        } catch (\Throwable $th) {
            echo $th;
        }
    }
}
