<?php

namespace IZNOPS\Utils;

use IZNOPS\Enums\EstadoReclamo;
use IZNOPS\Enums\ReclamoAsuntoEmail;
use IZNOPS\Enums\ReclamoEstado;
use IZNOPS\Models\Reclamo;

class ReclamoMailer
{

    public static function sendEmail(string $to,  $reclamo, $attachments = []): bool
    {

        $answerTo = getEnviroments()->answerToEmail;
        $titleProyect = getEnviroments()->titleProyect;
        $headers = array("Content-Type: text/html; charset=UTF-8", "From: {$titleProyect} <{$answerTo}>");
        $subject = self::getSubjectByStatusReclamo($reclamo->id_estado);
        // esta parte tendria que ser gestionado por el tipo de email
        ob_start();
        $reclamo = Reclamo::getReclamoAdminByID($reclamo->id)[0];
        $reclamo->id_estado = 1;
        // cargo el template
        echo view("email.email", compact("reclamo"));
        $body = ob_get_contents();
        ob_end_clean();

        return wp_mail($to, $subject, $body, $headers, $attachments);
    }

    public static  function sendEmailPDF($reclamo): bool
    {
        $pathPDF = ReclamoPDF::generatePdf($reclamo->id);
        if (!empty($pathPDF)) {
            // envio del primer correo
            self::sendEmail($reclamo->correo,  $reclamo, $pathPDF);
            // envio de correo2
            if (!empty($reclamo->correo2)) {
                self::sendEmail($reclamo->correo2, $reclamo, $pathPDF);
            }
            // elimino el pdf creado temporalmente
            ReclamoPDF::deletePdf($pathPDF);
            return true;
        }
        return false;
    }

    public static function getSubjectByStatusReclamo($estatus): string
    {
        // SON 9 POSIBLES CASOS
        $subject = "";
        switch ($estatus) {
            case ReclamoEstado::SIN_RESPUESTA:
                $subject = ReclamoAsuntoEmail::SIN_RESPUESTA;
                break;
            case ReclamoEstado::RECHAZADO_ESPERANDO_CONFIRMACION:
                $subject =  ReclamoAsuntoEmail::RECHAZADO_ESPERANDO_CONFIRMACION;
                break;
            case
            ReclamoEstado::RECHAZADO_CONFIRMADO_POR_CLIENTE:
                $subject =  ReclamoAsuntoEmail::RECHAZADO_CONFIRMADO_POR_CLIENTE;
                break;
            case
            ReclamoEstado::RECHAZADO_RECHAZADO_POR_CLIENTE:
                $subject =  ReclamoAsuntoEmail::RECHAZADO_RECHAZADO_POR_CLIENTE;
                break;
            case
            ReclamoEstado::ACEPTADO_ESPERANDO_CONFIRMACION:
                $subject = ReclamoAsuntoEmail::ACEPTADO_ESPERANDO_CONFIRMACION;
                break;
            case
            ReclamoEstado::ACEPTADO_CONFIRMADO_POR_CLIENTE:
                $subject = ReclamoAsuntoEmail::ACEPTADO_CONFIRMADO_POR_CLIENTE;
                break;
            case
            ReclamoEstado::ACEPTADO_RECHAZADO_POR_CLIENTE:
                $subject = ReclamoAsuntoEmail::ACEPTADO_RECHAZADO_POR_CLIENTE;
                break;
            case
            ReclamoEstado::APLAZADO:
                $subject = ReclamoAsuntoEmail::APLAZADO;
                break;
            case
            ReclamoEstado::FINALIZADO_SIN_RESPUESTA:
                $subject = ReclamoAsuntoEmail::FINALIZADO_SIN_RESPUESTA;
                break;

            default:
                $subject = ReclamoAsuntoEmail::DEFAULT;
                break;
        }
        return $subject;
    }
}
