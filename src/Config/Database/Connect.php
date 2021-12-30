<?php

namespace Luke\Migration\Config\Database;

use PDO;

class Connect
{
 
    private static ?PDO $instance;

    public static function getInstance(): ?PDO
    {
        if (empty(self::$instance)) {
            try {
                self::$instance = new \PDO(
                    "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME,
                    DB_USER,
                    DB_PASSWD,
                    DB_OPTIONS
                );
            } catch (\PDOException $exception) {
                throw new \PDOException($exception->getMessage(), (int)$exception->getCode());
            }
        }
        return self::$instance;
    }
}
