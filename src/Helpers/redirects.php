<?php

function lrp_redirect($page, $errors = ""): void
{
    if ($errors != "") {
        wp_redirect(home_url("/$page/") . "?errors=$errors");
    } else {
        wp_redirect(home_url("/$page/"));
    }
}

/**
 * Redirige la pagina a una pagina especifica con un msg
 * @param string $page Nombre de la Pagina
 * @param $msg Puede ser 1 o 2 
 * @return string
 */
function lrp_redirect_msg(string $page, $msg): void
{
    wp_redirect(home_url("/$page/") . "?msg=$msg");
}

function lrp_redirect_create(string $page): void
{
    wp_redirect(home_url("/$page/") . "?msg=1");
}

function lrp_redirect_update(string $page): void
{
    wp_redirect(home_url("/$page/") . "?msg=2");
}
