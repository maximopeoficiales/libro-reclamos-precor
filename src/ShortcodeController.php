<?php

namespace IZNOPS;

use IZNOP\Models\Users;

class ShortcodeController
{

    public function registrarReclamo($atts)
    {

        try {
            // $data = Users::get();
            return view("reclamo.create",[]);
        } catch (\Throwable $th) {
            echo $th;
        }
    }
}
