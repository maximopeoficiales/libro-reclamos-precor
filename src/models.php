<?php

/**
 * Antonella Helpers
 * Dont Touch this file
 * for more info
 * https://antonellaframework.com/documentacion
 */
foreach (glob(__DIR__ . "/Models/*.php") as $filename) {
    require   $filename;
}
