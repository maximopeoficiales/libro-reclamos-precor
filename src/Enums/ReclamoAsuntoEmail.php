<?php

namespace IZNOPS\Enums;

abstract class  ReclamoAsuntoEmail
{

    const SIN_RESPUESTA = "Tu Reclamo / Queja registrado satisfactoriamente";
    const RECHAZADO_ESPERANDO_CONFIRMACION = "Tu Reclamo / Queja ha sido rechazado";
    const RECHAZADO_CONFIRMADO_POR_CLIENTE = "Haz aceptado la respuesta del Reclamo / Queja";
    const RECHAZADO_RECHAZADO_POR_CLIENTE = "Haz rechazado la respuesta del Reclamo / Queja";
    const ACEPTADO_ESPERANDO_CONFIRMACION = "Tu Reclamo / Queja  ha sido aceptado";
    const ACEPTADO_CONFIRMADO_POR_CLIENTE = "Haz aceptado la respuesta del Reclamo / Queja";
    const ACEPTADO_RECHAZADO_POR_CLIENTE = "Haz rechazado la respuesta del Reclamo / Queja";
    const APLAZADO = "Tu Reclamo / Queja ha sido aplazado";
    const FINALIZADO_SIN_RESPUESTA = "Se ha cerrado tu Reclamo / Queja";
    const DEFAULT = "Resumen de Tu Reclamo / Queja ";
}
