<?php

namespace Luke\Migration;

use Exception;
use PDOException;
use Luke\Migration\Config\Database\Connect;
use Luke\Migration\MethodType;


class Schema
{

    /**
     * @throws Exception
     */
    public static function create(string $table, $callback)
    {
        $callbackValues = $callback(new MethodType());

        self::createQuery($table, $callbackValues);
    }

    private static function createQuery(string $table, array $values)
    {
        $queryCreate = "CREATE TABLE `$table`";
        $valuesInTable = implode(",", $values);
        $queryFinally = $queryCreate . "(" . $valuesInTable . ")";

        self::migrationTable($queryFinally);
    }

    /**
     * @throws Exception
     */
    private static function migrationTable(string $tableCreated)
    {
        try {
            $stmt = Connect::getInstance()->prepare($tableCreated);
            $stmt->execute();
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage());
        }
    }

//    private static function config(){
//        $engine = ' ENGINE=InnoDB ';
//        $autIncrement  = 'AUTO_INCREMENT=1 ';
//        $charset = 'DEFAULT CHARSET=utf8mb4 ';
//        $collate = 'COLLATE=utf8mb4_0900_ai_ci;';
//        return $engine . $autIncrement . $charset . $collate;
//    }
}