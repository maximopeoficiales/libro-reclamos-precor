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

function pathView($path = ""): string
{
    return plugin_dir_path(dirname(dirname(__FILE__))) . "resources/views/$path.php";
}

function assetCss(string $fileCss): string
{
    return plugin_dir_url(dirname(dirname(__FILE__))) . "assets/css/$fileCss";
}
function assetStaticReact(string $file): string
{
    return plugin_dir_url(dirname(dirname(__FILE__))) . "assets/build/static/$file";
}

function assetStaticCSSReact(string $file): string
{
    return plugin_dir_url(dirname(dirname(__FILE__))) . "assets/build/static/css/$file";
}
function assetStaticJSReact(string $file): string
{
    return plugin_dir_url(dirname(dirname(__FILE__))) . "assets/build/static/js/$file";
}
function assetBuildReact(string $file): string
{
    return plugin_dir_url(dirname(dirname(__FILE__))) . "assets/build/$file";
}

function assetWebservices(string $file): string
{
    return plugin_dir_url(dirname(dirname(__FILE__))) . "assets/webservices/$file";
}
