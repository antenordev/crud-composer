<?php

namespace Crud;

use PDO;
use PDOException;

abstract class Database
{
    /**
     * Method connect db
     */
    protected function connect()
    {
        // Test connect
        try
        {
            $connect = new PDO(
                "".getenv('DB_DRIVER').":host=".getenv('DB_HOST').";
                port=".getenv('DB_PORT').";
                dbname=".getenv('DB_DATABASE'),
                getenv('DB_USER'),
                getenv('DB_PASSWORD')
            );
            $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $connect;
        }
        // Trait Exception
        catch(PDOException $error)
        {
            return $error->getMessage();
        }
    }
}