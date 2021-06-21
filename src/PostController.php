<?php

namespace IZNOPS;

use IZNOP\Models\Reclamo;
use IZNOPS\Enums\ActionName;
use IZNOPS\Enums\RoutesReclamo;
use IZNOPS\Uploader\Uploader;
use IZNOPS\Validator\ReclamoValidator;
use IZNOPS\Validator\Validator;

class PostController
{

    public function __construct()
    {
    }

    public function initializer()
    {

        switch ($_POST["action_name"]) {
            case ActionName::registrarReclamo:
                self::registrarReclamo();
                break;
            default:
                return;
        }
    }
    public static function registrarReclamo()
    {
        try {
            $responseValidator = Validator::validatePost(ReclamoValidator::validations);
            if ($responseValidator["validate"]) {
                // dd(lrp_hash_file($_FILES["ruta_archivo"]));
                // es valido los parametros
                // dd($_POST + $_FILES);
                // dd(wp_get_upload_dir());
                $newFileName = Uploader::uploadFileInReclamo($_FILES["ruta_archivo"]);
                // dd($newFileName);
                $page = RoutesReclamo::registrar;
                $reclamo = new Reclamo();

                $reclamo->id_cli = lrp_sanitize($_POST["cod_cli"]);
                $reclamo->nombre =  lrp_sanitize($_POST["nombre"]);
                $reclamo->nrdoc =  lrp_sanitize($_POST["nrdoc"]);
                $reclamo->documento =  lrp_sanitize($_POST["documento"]);
                $reclamo->celular =  lrp_sanitize($_POST["celular"]);
                $reclamo->correo =  lrp_sanitize($_POST["correo"]);
                $reclamo->direccion =  lrp_sanitize($_POST["direccion"]);
                $reclamo->id_ubigeo =  lrp_sanitize($_POST["id_ubigeo"]);
                $reclamo->correo2 =  lrp_sanitize($_POST["correo2"]);
                $reclamo->relacionado =  lrp_sanitize($_POST["relacionado"]);
                $reclamo->id_tipo_comprobante =  lrp_sanitize($_POST["id_tipo_comprobante"]);
                $reclamo->comprobante =  lrp_sanitize($_POST["comprobante"]);
                $reclamo->fecha =  lrp_sanitize($_POST["fecha"]);
                $reclamo->ejecutivo =  lrp_sanitize($_POST["ejecutivo"]);
                $reclamo->descripcion =  lrp_sanitize($_POST["descripcion"]);
                $reclamo->id_tipo_reclamacion =  lrp_sanitize($_POST["id_tipo_reclamacion"]);
                $reclamo->detalle =  lrp_sanitize($_POST["detalle"]);
                $reclamo->ruta_archivo =  $newFileName;
                $reclamo->id_estado =  1;
                $reclamo->created_at =  lrp_getFechaActual(true);
                $reclamo->save();

                lrp_redirect_create($page);
            } else {
                // no es valido
                lrp_redirect(RoutesReclamo::registrar, $responseValidator["errors"]);
            }
        } catch (\Throwable $th) {
            echo $th;
        }
    }
}
