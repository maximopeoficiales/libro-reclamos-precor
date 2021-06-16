<?php

function lrp_redirect($page, $errors = ""): void
{
    if ($errors != "") {
        wp_redirect(home_url("/$page/") . "?errors=$errors");
    } else {
        wp_redirect(home_url("/$page/"));
    }
}
