<?php

namespace IZNOPS;

use Illuminate\Database\Capsule\Manager as DatabaseOrm;

class DatabaseLRP
{
    public $database;

    public function __construct()
    {
        $this->database = new DatabaseOrm;
        $this->database->addConnection([
            'driver'    => 'mysql',
            'host'      => DB_HOST,
            'database'  => DB_NAME,
            'username'  => DB_USER,
            'password'  => DB_PASSWORD,
            'charset'   => DB_CHARSET,
            // 'collation' => DB_COLLATE,
        ]);

        // Make this Capsule instance available globally via static methods... (optional)
        $this->database->setAsGlobal();
        // Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
        $this->database->bootEloquent();
        // return $this;
    }
    public function getDatabase()
    {
        return $this->database;
    }
}
