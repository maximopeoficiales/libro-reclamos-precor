<?php

namespace IZNOPS\Utils;

class ReclamoMailer
{

    public static function sendEmail(string $to, string $subject, string $tipoEmail, $reclamo, $attachments = []): bool
    {
        $headers = array('Content-Type: text/html; charset=UTF-8', 'From: My Site Name <support@example.com>');
        // esta parte tendria que ser gestionado por el tipo de email
        $body = '<h1>Soy un titulo</h1>';

        return wp_mail($to, $subject, $body, $headers, $attachments);
    }

    public static  function sendEmailPDF(string $subject,  $reclamo, $tipoEmail): bool
    {
        $pathPDF = ReclamoPDF::generatePdf($reclamo->id);
        if (!empty($pathPDF)) {
            // envio del primer correo
            self::sendEmail($reclamo->correo, $subject, "", $reclamo, $pathPDF);
            // envio de correo2
            if (!empty($reclamo->correo2)) {
                self::sendEmail($reclamo->correo2, $subject, "", $reclamo, $pathPDF);
            }
            // elimino el pdf creado temporalmente
            ReclamoPDF::deletePdf($pathPDF);
            return true;
        }
        return false;
    }
}
