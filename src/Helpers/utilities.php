<?php
// http://localhost/wp-content/plugins/mi-custom-post-type-computers/assets
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

function lrp_isMaxco(): bool
{
    return true;
}
