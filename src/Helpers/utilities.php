<?php
// http://localhost/wp-content/plugins/mi-custom-post-type-computers/assets
function asset($uri = ""): string
{
    return plugin_dir_url(dirname(dirname(__FILE__))) . "assets/$uri";
}

// /var/www/html/wp-content/plugins/mi-custom-post-type-computers/
function path($path = ""): string
{
    return plugin_dir_path(dirname(dirname(__FILE__))) . $path;
}

