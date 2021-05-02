<?php

namespace IZNOPS;

require "Database/database.php";

class ShortcodeController
{
    public function __construct()
    {
    }
    public static function DB()
    {
        return (new DatabaseLRP())->getDatabase();
    }
    
    public function registrarReclamo($atts)
    {
        try {
            dd(self::DB()::table("wp_users")->get());
        } catch (\Throwable $th) {
            echo $th;
        }
    }
}
