<?php


use Illuminate\Database\Capsule\Manager as Capsule;

global $wpdb;
$database = new Capsule();
$database->addConnection([
    'driver'    => 'mysql',
    'host'      => DB_HOST,
    'database'  => DB_NAME,
    'username'  => DB_USER,
    'password'  => DB_PASSWORD,
    'charset'   => DB_CHARSET,
    'prefix'    => $wpdb->prefix,
    // 'collation' => DB_COLLATE,
]);

// Make this Capsule instance available globally via static methods... (optional)
$database->setAsGlobal();
// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
$database->bootEloquent();
        // return $this;
