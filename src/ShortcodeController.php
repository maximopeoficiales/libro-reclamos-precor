<?php

namespace IZNOPS;

use IZNOP\Models\QuerysCustom;
use IZNOP\Models\Reclamo;
use IZNOP\Models\ReclamoComprobante;
use IZNOP\Models\ReclamoEstado;
use IZNOP\Models\Users;
use IZNOPS\Enums\RoutesReclamo;

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
            $uriReclamoDetalle = lrp_get_url_wordpress(RoutesReclamo::adminDetalle);
            // dd($reclamos);
            return view("reclamo.admin.list", compact("reclamos", "comprobantes", "estados","uriReclamoDetalle"));
        } catch (\Throwable $th) {
            echo $th;
        }
    }

    public function adminListarReclamosDetalle($atts)
    {
        try {
            $id_reclamo = $_GET["id"];
            if ($id_reclamo != "" || $id_reclamo != null) {
                $reclamo = Reclamo::getReclamoAdminByID($id_reclamo);
                // existe el reclamo
                if (count($reclamo) != 0) {
                    // $reclamo[0]->id_estado = 2;
                    return view("reclamo.admin.details", ["reclamo" => $reclamo[0]]);
                }
                return view("errors.404", ["msg" => "No existe el Reclamo/Queja"]);
            }
            return view("errors.404", ["msg" => "Acceso Restringido"]);
        } catch (\Throwable $th) {
            echo $th;
        }
    }
}
