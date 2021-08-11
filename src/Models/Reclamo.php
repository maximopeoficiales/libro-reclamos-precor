<?php

namespace IZNOPS\Models;

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

                CASE WHEN {$wpdb->prefix}t1.id_estado in (1,2,5) THEN
                CASE WHEN DATEDIFF(NOW(),{$wpdb->prefix}t1.updated_at) > 30
                THEN 'Vencido'

                WHEN DATEDIFF(NOW(),{$wpdb->prefix}t1.updated_at) = 30 THEN 'Vence Hoy' ELSE
                CONCAT('Vence en ',30 - (DATEDIFF(NOW(),{$wpdb->prefix}t1.updated_at)),' dias') END

                WHEN {$wpdb->prefix}t1.id_estado IN (8) THEN
                CASE WHEN DATEDIFF(NOW(),{$wpdb->prefix}t1.fecha_aplazado) > 30
                THEN 'Vencido'
                WHEN DATEDIFF(NOW(),{$wpdb->prefix}t1.fecha_aplazado) = 30 THEN 'Vence hoy' ELSE
                CONCAT('Vence en ',30 - (DATEDIFF(NOW(),{$wpdb->prefix}t1.fecha_aplazado)),' dias') END
                ELSE ''
                END as vencimiento,
                {$wpdb->prefix}t3.descripcion as tipo_comprobante,
                {$wpdb->prefix}t1.comprobante,
                {$wpdb->prefix}t1.documento
            ")
            ->join("reclamo_estado as t2", "t2.id", "=", "t1.id_estado")
            ->join("reclamo_comprobante as t3", "t3.id", "=", "t1.id_tipo_comprobante")
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
            $query->whereRaw("DATE_FORMAT({$wpdb->prefix}t1.created_at,'%Y-%m-%d') = '{$params["fecha_reclamo"]}'");
        }

        if ($params["id_estado"] != "" && !is_null($params["id_estado"])) {
            $query->where("t1.id_estado", "=", $params["id_estado"]);
        }
        if ($params["documento"] != "" && !is_null($params["documento"])) {
            $query->where("t1.documento", "=", $params["documento"]);
        }
        return $query->get();
    }
    public static function getReclamoAdminByID($id_reclamo)
    {
        global $wpdb;
        return Manager::table("reclamo AS t1")
            ->selectRaw("{$wpdb->prefix}t1.id as id_reclamo,CONCAT('#',RIGHT(CONCAT('0000000',{$wpdb->prefix}t1.id),7)) as codigo,
            DATE_FORMAT(DATE({$wpdb->prefix}t1.fecha),'%d/%m/%Y') as fecha_compra,
            
            DATE_FORMAT(DATE({$wpdb->prefix}t1.updated_at),'%d/%m/%Y') as fecha_reclamo,
            {$wpdb->prefix}t2.descripcion as estado,
            {$wpdb->prefix}t1.*,
            CONCAT({$wpdb->prefix}t6.descripcion,',',{$wpdb->prefix}t5.descripcion,',',{$wpdb->prefix}t4.descripcion) as departamentoProvinciaDistrito,
            {$wpdb->prefix}t3.descripcion as tipo_comprobante,
            DATE_FORMAT(DATE({$wpdb->prefix}t1.fecha_aplazado),'%d/%m/%Y') as fecha_aplazado,
            CASE WHEN {$wpdb->prefix}t1.id_tipo_reclamacion = 1 THEN 'Reclamo' ELSE 'Queja' END AS tipo_reclamo
            ")
            ->join("reclamo_estado as t2", "t2.id", "=", "t1.id_estado")
            ->join("reclamo_comprobante as t3", "t3.id", "=", "t1.id_tipo_comprobante")
            ->join("ubigeo as t4", "t4.id", "=", "t1.id_ubigeo")
            ->join("ubigeo_provincia as t5", "t5.id", "=", "t4.id_ubigeo_provincia")
            ->join("ubigeo_departamento as t6", "t6.id", "=", "t5.id_departamento")
            ->where("t1.id", "=", $id_reclamo)
            ->get();
    }
}
