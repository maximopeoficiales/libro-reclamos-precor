<?php

namespace IZNOPS;

use IZNOP\Models\QuerysCustom;
use IZNOP\Models\Reclamo;
use IZNOP\Models\ReclamoComprobante;
use IZNOP\Models\ReclamoEstado;
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
            return view("reclamo.create", compact("comprobantes", "ubigeos"));
        } catch (\Throwable $th) {
            echo $th;
        }
    }

    public function listarReclamos($atts)
    {

        try {
            $reclamos = Reclamo::getReclamos($_GET);
            return view("reclamo.list", compact("reclamos"));
        } catch (\Throwable $th) {
            echo $th;
        }
    }
    public function adminListarReclamos($atts)
    {
        try {
            $reclamos = Reclamo::getAdminReclamos($_GET);
            $comprobantes = ReclamoComprobante::get();
            $estados = ReclamoEstado::get();

            return view("reclamo.admin.list", compact("reclamos", "comprobantes", "estados"));
        } catch (\Throwable $th) {
            echo $th;
        }
    }
}
