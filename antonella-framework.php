<?php

namespace IZNOPS;

date_default_timezone_set('America/Lima');

/*
Plugin Name: Libro de Reclamacion para Precor
Plugin URI:
Description: Libro de Reclamacion para Precor
Version: 1.0.0
Author: Maximo Apaza Chirhuana
Author URI:
Framework: Antonella Framework for WP
Framework URI: http://antonellaframework.com
License: GPL2+
Text Domain: Carlos Herrera
Domain Path: /languages
*/

defined('ABSPATH') or die(__('Lo siento por aqui no puedes pasar :)'));

/*
* Class Caller.
* cuando una clase es llamada hace un include
* al archivo con su mismo nombre
* se respeta mayusculas y minusculas
*
* @return null
*/
define('NELLA_URL', __FILE__);

$loader = require __DIR__ . '/vendor/autoload.php';
$antonella = new Start;
