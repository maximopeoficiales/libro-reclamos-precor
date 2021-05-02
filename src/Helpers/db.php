<?php
function lrp_getDBPrefix()
{
    global $wpdb;
    return $wpdb->prefix . "lrp_";
}
function lrp_getWPDB(): wpdb
{
    global $wpdb;
    return $wpdb;
}
