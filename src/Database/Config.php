<?php


define("BASE_PATH", $_SERVER['pwd'] ?? __DIR__ . "/../../");
define("CONFIG_PATH", BASE_PATH . "/database/migrations");
define("PATH_CONFIG_DB", BASE_PATH . "/db.php");


define("DB_HOST", "127.0.0.1");
define("DB_USER", "root");
define("DB_NAME", "migration");
define("DB_PASSWD", "root");
define("DB_OPTIONS", [
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'",
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
    PDO::ATTR_CASE => PDO::CASE_NATURAL
]);
