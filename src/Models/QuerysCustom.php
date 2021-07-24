<?php

namespace IZNOPS\Models;

use Illuminate\Database\Capsule\Manager;

class QuerysCustom
{
    public static function getUbigeos()
    {
        global $wpdb;

        return Manager::table("ubigeo_departamento AS t1")
            ->selectRaw("{$wpdb->prefix}t3.id as id_ubigeo,CONCAT({$wpdb->prefix}t1.descripcion,'-',{$wpdb->prefix}t2.descripcion,'-',{$wpdb->prefix}t3.descripcion) as descripcion")
            ->join("ubigeo_provincia as t2", "t2.id_departamento", "=", "t1.id")
            ->join("ubigeo as t3", "t3.id_ubigeo_provincia", "=", "t2.id")
            ->where("t1.id_pais", "=", 604)
            ->get();
    }
}
