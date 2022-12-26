<?php

namespace Luke\Schemas;

use Exception;
use Luke\Types\Blueprint;
use Luke\Migration\Config\Database\Connect;

class Schema
{
    /**
     * @throws Exception
     */
    public static function create(string $table, $callback)
    {
        $methodType = new Blueprint();

        $callback($methodType);

        self::tableExist($table);

        self::handleTable($table, $methodType->getQuery());
    }

    private static function tableExist()
    {
        return null;
    }

    private static function handleTable($table, $values)
    {
        Connect::migrationTable("CREATE TABLE IF  NOT  EXISTS `$table` ($values)");
    }


    //    private static function config(){
    //        $engine = ' ENGINE=InnoDB ';
    //        $autIncrement  = 'AUTO_INCREMENT=1 ';
    //        $charset = 'DEFAULT CHARSET=utf8mb4 ';
    //        $collate = 'COLLATE=utf8mb4_0900_ai_ci;';
    //        return $engine . $autIncrement . $charset . $collate;
    //    }
}
