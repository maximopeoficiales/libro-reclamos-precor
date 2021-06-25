<?php

namespace IZNOPS;

use IZNOP\Models\QuerysCustom;
use IZNOP\Models\Reclamo;
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
            return view("reclamo.create", compact("comprobantes", "ubigeos"));
        } catch (\Throwable $th) {
            echo $th;
        }
    }

    public function listarReclamos($atts)
    {

        try {
            $reclamos = [];
            $id_reclamo = $_GET["id_reclamo"] == "" ? null : $_GET["id_reclamo"];
            $id_cli = $_GET["id_cli"] == "" ? null : $_GET["id_cli"];

            if (is_null($_GET["id_reclamo"]) && is_null($_GET["id_cli"])) {
                $reclamos = Reclamo::getReclamos();
            }
            if (!is_null($id_reclamo) && is_null($id_cli)) {
                $reclamos = Reclamo::getReclamos($id_reclamo);
            }

            if (is_null($id_reclamo) && !is_null($id_cli)) {
                $reclamos = Reclamo::getReclamos(null, $id_cli);
            }
            if (!is_null($id_reclamo) && !is_null($id_cli)) {
                $reclamos = Reclamo::getReclamos($id_reclamo, $id_cli);
            }
            return view("reclamo.list", compact("reclamos"));
        } catch (\Throwable $th) {
            echo $th;
        }
    }
    public function adminListarReclamos($atts)
    {
        try {
            $reclamos = [];
            $id_reclamo = $_GET["id_reclamo"] == "" ? null : $_GET["id_reclamo"];
            $id_cli = $_GET["id_cli"] == "" ? null : $_GET["id_cli"];
            $reclamos = Reclamo::getAdminReclamos();

            return view("reclamo.admin.list", compact("reclamos"));
        } catch (\Throwable $th) {
            echo $th;
        }
    }
}
