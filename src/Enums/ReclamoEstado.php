<?php

namespace IZNOPS\Enums;

abstract class  ReclamoEstado
{
    const SIN_RESPUESTA = 1;
    const RECHAZADO_ESPERANDO_CONFIRMACION = 2;
    const RECHAZADO_CONFIRMADO_POR_CLIENTE = 3;
    const RECHAZADO_RECHAZADO_POR_CLIENTE = 4;
    const ACEPTADO_ESPERANDO_CONFIRMACION = 5;
    const ACEPTADO_CONFIRMADO_POR_CLIENTE = 6;
    const ACEPTADO_RECHAZADO_POR_CLIENTE = 7;
    const APLAZADO = 8;
    const FINALIZADO_SIN_RESPUESTA = 9;
}