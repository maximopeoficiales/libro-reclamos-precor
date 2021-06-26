<?php

namespace IZNOP\Models;

use Illuminate\Database\Capsule\Manager;
use Illuminate\Database\Eloquent\Model;

class Reclamo extends Model
{
    protected $table = "reclamo";

    public static function getReclamos($atts)
    {
        global $wpdb;
        $id_reclamo = $atts["id_reclamo"];
        $id_cli = $atts["id_cli"];
        $query = Manager::table("reclamo AS t1")
            ->selectRaw("{$wpdb->prefix}t1.id as id_reclamo,CONCAT('#',RIGHT(CONCAT('0000000',{$wpdb->prefix}t1.id),7)) as codigo,
            DATE_FORMAT(DATE({$wpdb->prefix}t1.created_at),'%d/%m/%Y') as fecha,
        {$wpdb->prefix}t2.descripcion as estado
        ")
            ->join("reclamo_estado as t2", "t2.id", "=", "t1.id_estado")
            ->orderByDesc("t1.created_at");

        if ($id_reclamo != "" && !is_null($id_reclamo)) {
            $query->where("t1.id", "=", $id_reclamo);
        }

        if ($id_cli != "" && !is_null($id_cli)) {
            $query->where("t1.id_cli", "=", $id_cli);
        }
        return $query->get();
    }
    public static function getAdminReclamos($params = [])
    {
        global $wpdb;

        $query = Manager::table("reclamo AS t1")
            ->selectRaw("{$wpdb->prefix}t1.id as id_reclamo,
                CONCAT('#',RIGHT(CONCAT('0000000',{$wpdb->prefix}t1.id),7)) as codigo,
                DATE_FORMAT(DATE({$wpdb->prefix}t1.created_at),'%d/%m/%Y') as fecha,
                {$wpdb->prefix}t2.descripcion as estado,
                CASE WHEN {$wpdb->prefix}t1.id_estado in (1,2,5,8) THEN
                CONCAT('Vence en ',DATEDIFF(NOW(),{$wpdb->prefix}t1.updated_at),' dias') END as vencimiento,
                {$wpdb->prefix}t3.descripcion as tipo_comprobante,
                {$wpdb->prefix}t1.comprobante,
                {$wpdb->prefix}t1.documento
            ")
            ->join("reclamo_estado as t2", "t2.id", "=", "t1.id_estado")
            ->join("reclamo_comprobante as t3", "t3.id", "=", "t1.id")
            ->orderByDesc("t1.created_at");

        if ($params["id_cli"] != "" && !is_null($params["id_cli"])) {
            $query->where("t1.id_cli", "=", $params["id_cli"]);
        }
        if ($params["id_tipo_comprobante"] != "" && !is_null($params["id_tipo_comprobante"])) {
            $query->where("t1.id_tipo_comprobante", "=", $params["id_tipo_comprobante"]);
        }
        if ($params["n_comprobante"] != "" && !is_null($params["n_comprobante"])) {
            $query->where("t1.comprobante", "=", $params["n_comprobante"]);
        }

        if ($params["fecha_reclamo"] != "" && !is_null($params["fecha_reclamo"])) {
            $query->where("t1.created_at", "=", $params["fecha_reclamo"]);
        }

        if ($params["id_estado"] != "" && !is_null($params["id_estado"])) {
            $query->where("t1.id_estado", "=", $params["id_estado"]);
        }
        if ($params["documento"] != "" && !is_null($params["documento"])) {
            $query->where("t1.documento", "=", $params["documento"]);
        }
        return $query->get();
    }
}
