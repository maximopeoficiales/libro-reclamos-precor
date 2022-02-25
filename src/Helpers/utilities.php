<?php
// http://localhost/wp-content/plugins/mi-custom-post-type-computers/assets

use IZNOPS\Utils\Enviroments;

function asset($uri = ""): string
{
    return plugin_dir_url(dirname(dirname(__FILE__))) . "assets/$uri";
}
// /var/www/html/wp-content/plugins/mi-custom-post-type-computers/assets
function assetPath($uri = ""): string
{
    return plugin_dir_path(dirname(dirname(__FILE__))) . "assets/$uri";
}
// /var/www/html/wp-content/plugins/mi-custom-post-type-computers/
function path($path = ""): string
{
    return plugin_dir_path(dirname(dirname(__FILE__))) . $path;
}

function getPathUploadsReclamo()
{
    return wp_get_upload_dir()["basedir"] . "/reclamo/";
}

function getAssetUploadsReclamo()
{
    return wp_get_upload_dir()["baseurl"] . "/reclamo/";
}

function assetImgEmail($nameImg): string
{
    $nameImg = str_replace(" ", "%20", $nameImg);

    if (lrp_isMaxco()) {
        return asset("img/email/maxco/$nameImg");
    } else {
        return asset("img/email/precor/$nameImg");
    }
}

function lrp_isMaxco(): bool
{
    $env = getEnviroments();
    return $env->isMaxco;
}

function getEnviroments(): Enviroments
{
    return new Enviroments();
}

function lrp_getColorBase()
{
    $env = getEnviroments();
    return lrp_isMaxco() ? $env->colorMaxco : $env->colorPrecor;
}
function lrp_getTitleProyect()
{
    $env = getEnviroments();
    return lrp_isMaxco() ? $env->titleProyectMaxco : $env->titleProyectPrecor;
}



