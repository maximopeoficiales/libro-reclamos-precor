<?php

namespace IZNOPS;

use IZNOP\Models\Users;

class ShortcodeController
{

    public function registrarReclamo($atts)
    {

        try {
            $data = Users::get();
            foreach ($data as $key => $user) {
                echo $user->user_login . "<br>";
            }
        } catch (\Throwable $th) {
            echo $th;
        }
    }
}
