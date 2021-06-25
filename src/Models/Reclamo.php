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
            DATE_FORMAT(DATE({$wpdb->prefix}t1.created_at),'%d/%m/%Y') as fecha,
        {$wpdb->prefix}t2.descripcion as estado
        ")
            ->orderByDesc("t1.created_at")
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
    public static function getAdminReclamos()
    {
        global $wpdb;
        /* select t1.id as id_tipocomprobante, concat('#', right(concat('0000000',t1.id),7)) as Codigo,
        date(t1.created_at) as Fecha, t2.descripcion as Estado,
        case when t1.id_estado in (1,2,5,8) then 
        concat('Vence en ',datediff(now(), t1.updated_at),' días') end as Vencimiento, 
        t3.descripcion as 'Tipo comprobante', t1.Comprobante, t1.Documento
        from wp_reclamo t1
        inner join wp_reclamo_estado t2 on t2.id = t1.id_estado
        inner join wp_reclamo_comprobante t3 on t3.id = t1.id */

        return Manager::table("reclamo AS t1")
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
            ->orderByDesc("t1.created_at")
            ->get();
    }
}
