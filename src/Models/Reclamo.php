<?php

namespace IZNOP\Models;

use Illuminate\Database\Capsule\Manager;
use Illuminate\Database\Eloquent\Model;

class Reclamo extends Model
{
    protected $table = "reclamo";

    public static function getReclamos($cod_cli = 0, $id_cli = 0)
    {
        global $wpdb;

        return Manager::table("reclamo AS t1")
            ->selectRaw("{$wpdb->prefix}t1.id as id_reclamo,CONCAT('#',RIGHT(CONCAT('0000000',{$wpdb->prefix}t1.id),7)) as codigo,
            DATE({$wpdb->prefix}t1.created_at) as fecha,
            {$wpdb->prefix}t2.descripcion as estado
            ")
            ->join("reclamo_estado as t2", "t2.id", "=", "t1.id_estado")
            // ->where("t1.id_pais", "=", 604)
            ->get();
    }
}
