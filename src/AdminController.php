<?php

namespace IZNOPS;

class AdminController
{

    public function __construct()
    {
    }
    public static function index()
    {
        try {
            require pathView('adminPage');
        } catch (\Throwable $th) {
            echo $th;
        }
    }

    public static function saveOptions()
    {
        update_option('precor_validez_oferta', $_POST['precor_validez_oferta']);
        update_option('precor_text_no_hay_stock', $_POST['precor_text_no_hay_stock']);
        update_option('precor_emails_reclamos', $_POST['precor_emails_reclamos']);
    }
}
