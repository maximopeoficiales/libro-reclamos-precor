<?php

namespace IZNOPS\Utils;

class ReclamoMailer
{

    public static function sendEmail($reclamo, $attachments = []): bool
    {
        $to = 'maximopeoficiales@gmail.com';
        $subject = 'Libro de Reclamaciones';
        $body = 'The email body content';
        // falta cargar un template
        $headers = array('Content-Type: text/html; charset=UTF-8', 'From: My Site Name <support@example.com>');



        return wp_mail($to, $subject, $body, $headers, $attachments);
    }
}
