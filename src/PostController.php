<?php

namespace IZNOPS;

use IZNOPS\Models\Reclamo;
use IZNOPS\Bcrypt\Bcrypt;
use IZNOPS\Enums\ActionName;
use IZNOPS\Enums\RoutesReclamo;
use IZNOPS\Uploader\Uploader;
use IZNOPS\Utils\ReclamoMailer;
use IZNOPS\Validator\ReclamoValidator;
use IZNOPS\Validator\Validator;

class PostController
{

    public function __construct()
    {
    }

    public static function initializer()
    {

        switch ($_POST["action_name"]) {
            case ActionName::registrarReclamo:
                self::registrarReclamo();
                break;
            case ActionName::actualizarEstadoReclamoCaso1:
                self::actualizarEstadoReclamoCaso();
                break;
            case ActionName::enterAnswerClient:
                self::actualizarEstadoReclamoCasoCliente();
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
                $reclamo->monto_reclamado =  lrp_sanitize($_POST["monto_reclamado"]);
                $reclamo->ejecutivo =  lrp_sanitize($_POST["ejecutivo"]);
                $reclamo->descripcion =  lrp_sanitize($_POST["descripcion"]);
                $reclamo->id_tipo_reclamacion =  lrp_sanitize($_POST["id_tipo_reclamacion"]);
                $reclamo->detalle =  lrp_sanitize($_POST["detalle"]);
                $reclamo->ruta_archivo =  $newFileName;
                $reclamo->id_estado =  1;
                $reclamo->created_at =  lrp_getFechaActual(true);
                $reclamo->save();

                // enviar correo de creacion de queja
                if ($_POST["id_tipo_reclamacion"] == 1) {
                    ReclamoMailer::sendEmailPDF("Reclamo registrado satisfactoriamente", $reclamo, 1);
                } else {
                    ReclamoMailer::sendEmailPDF("Queja registrada satisfactoriamente", $reclamo, 1);
                }
                lrp_redirect_create($page);
            } else {
                // no es valido
                lrp_redirect(RoutesReclamo::registrar, $responseValidator["errors"]);
            }
        } catch (\Throwable $th) {
            echo $th;
        }
    }

    public static function actualizarEstadoReclamoCaso()
    {
        try {
            $id_reclamo = lrp_sanitize($_POST["id_reclamo"]);
            $responseValidator = Validator::validatePost(ReclamoValidator::actualizarEstadoCaso1);
            if ($responseValidator["validate"]) {
                $reclamo = Reclamo::find($id_reclamo);
                $newFileName = Uploader::uploadFileInReclamo($_FILES["ruta_archivo2"]);
                $reclamo->ruta_archivo2 =  $newFileName;
                $reclamo->id_estado =   lrp_sanitize($_POST["id_estado"]);
                $reclamo->comentario_admin =   lrp_sanitize($_POST["comentario_admin"]);
                if ($_POST["fecha_aplazado"] != null ||  $_POST["fecha_aplazado"] != "") {
                    $reclamo->fecha_aplazado =   lrp_sanitize($_POST["fecha_aplazado"]);
                }
                $reclamo->updated_at =  lrp_getFechaActual(true);
                $reclamo->save();
                $id_reclamo = Bcrypt::encryption($id_reclamo);
                lrp_redirect(RoutesReclamo::adminDetalle . "?id=$id_reclamo&msg=1");
            } else {
                // no es valido
                lrp_redirect(RoutesReclamo::adminDetalle, $responseValidator["errors"] . "&id=$id_reclamo");
            }
        } catch (\Throwable $th) {
            echo $th;
        }
    }
    public static function actualizarEstadoReclamoCasoCliente()
    {
        try {
            $id_reclamo = lrp_sanitize($_POST["id_reclamo"]);
            $responseValidator = Validator::validatePost(ReclamoValidator::actualizarEstadoCasoCliente);
            if ($responseValidator["validate"]) {
                $reclamo = Reclamo::find($id_reclamo);
                $newFileName = Uploader::uploadFileInReclamo($_FILES["ruta_archivo3"]);
                $reclamo->ruta_archivo3 =  $newFileName;
                $reclamo->id_estado =   lrp_sanitize($_POST["id_estado"]);
                $reclamo->comentario_cliente =   lrp_sanitize($_POST["comentario_cliente"]);
                $reclamo->updated_at =  lrp_getFechaActual(true);
                $reclamo->save();
                $id_reclamo = Bcrypt::encryption($id_reclamo);
                lrp_redirect(RoutesReclamo::detalle . "?id=$id_reclamo&msg=1");
            } else {
                // no es valido
                lrp_redirect(RoutesReclamo::detalle, $responseValidator["errors"] . "&id=$id_reclamo");
            }
        } catch (\Throwable $th) {
            echo $th;
        }
    }
}
