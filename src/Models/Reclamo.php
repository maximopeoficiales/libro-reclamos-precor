<?php

namespace IZNOP\Models;

use Illuminate\Database\Capsule\Manager;
use Illuminate\Database\Eloquent\Model;

class Reclamo extends Model
{
    protected $table = "reclamo";

    public static function getReclamos($id_reclamo = null, $id_cli = null)
    {
        global $wpdb;
        $query = Manager::table("reclamo AS t1")
            ->selectRaw("{$wpdb->prefix}t1.id as id_reclamo,CONCAT('#',RIGHT(CONCAT('0000000',{$wpdb->prefix}t1.id),7)) as codigo,
        DATE({$wpdb->prefix}t1.created_at) as fecha,
        {$wpdb->prefix}t2.descripcion as estado
        ")
            ->join("reclamo_estado as t2", "t2.id", "=", "t1.id_estado");
        if (is_null($id_reclamo) && is_null($id_cli)) {
            return $query->get();
        }
        if (!is_null($id_reclamo) && is_null($id_cli)) {
            return $query->where("t1.id", "=", $id_reclamo)->get();
        }

        if (is_null($id_reclamo) && !is_null($id_cli)) {
            return $query->where("t1.id_cli", "=", $id_cli)->get();
        }
        if (!is_null($id_reclamo) && !is_null($id_cli)) {
            return $query->where("t1.id_cli", "=", $id_cli)
                ->where("t1.id", "=", $id_reclamo)->get();
        }
    }
}
