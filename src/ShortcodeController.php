<?php

namespace IZNOPS;

use IZNOP\Models\QuerysCustom;
use IZNOP\Models\Reclamo;
use IZNOP\Models\ReclamoComprobante;
use IZNOP\Models\ReclamoEstado;
use IZNOP\Models\Users;
use IZNOPS\Bcrypt\Bcrypt;
use IZNOPS\Enums\RoutesReclamo;

class ShortcodeController
{

    public function registrarReclamo($atts)
    {

        try {
            // $data = Users::get();
            $comprobantes = ReclamoComprobante::get();
            $ubigeos = QuerysCustom::getUbigeos();
            $extras = getProfileExtraFieldsUser();
            $user = get_userdata(get_current_user_id());
            return view("reclamo.client.create", compact(
                "extras","user",
                "comprobantes", "ubigeos"));
        } catch (\Throwable $th) {
            echo $th;
        }
    }

    public function listarReclamos($atts)
    {

        try {
           
            $reclamos = Reclamo::getReclamos($_GET);
            $uriReclamoDetalle = lrp_get_url_wordpress(RoutesReclamo::detalle);
            foreach ($reclamos as $reclamo) {
                $reclamo->id_reclamo = Bcrypt::encryption($reclamo->id_reclamo);
            }
            return view("reclamo.client.list", compact("reclamos", "uriReclamoDetalle"));
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
            foreach ($reclamos as $reclamo) {
                $reclamo->id_reclamo = Bcrypt::encryption($reclamo->id_reclamo);
            }
            return view("reclamo.admin.list", compact("reclamos", "comprobantes", "estados", "uriReclamoDetalle"));
        } catch (\Throwable $th) {
            echo $th;
        }
    }

    public function adminListarReclamosDetalle($atts)
    {
        try {
            if ($_GET["id"] != null) {
                $_GET["id"] = Bcrypt::decryption($_GET["id"]);
            }
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
    public function clienteListarReclamosDetalle($atts)
    {
        try {
            if ($_GET["id"] != null) {
                $_GET["id"] = Bcrypt::decryption($_GET["id"]);
            }
            $id_reclamo = $_GET["id"];
            if ($id_reclamo != "" || $id_reclamo != null) {
                $reclamo = Reclamo::getReclamoAdminByID($id_reclamo);
                // existe el reclamo
                if (count($reclamo) != 0) {
                    // $reclamo[0]->id_estado = 2;
                    return view("reclamo.client.details", ["reclamo" => $reclamo[0]]);
                }
                return view("errors.404", ["msg" => "No existe el Reclamo/Queja"]);
            }
            return view("errors.404", ["msg" => "Acceso Restringido"]);
        } catch (\Throwable $th) {
            echo $th;
        }
    }
}
