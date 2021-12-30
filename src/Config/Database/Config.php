<?php


define("CONFIG_PATH",$_SERVER["PWD"] . "/database/migrations");
define("PATH_CONFIG_DB",$_SERVER["PWD"] . "/db.php");

define("CONF_DB_HOST","127.0.0.1");
define("CONF_DB_USER","root");
define("CONF_DB_NAME","project");
define("CONF_DB_PASSWD","root");
define("CONF_DB_OPTIONS",[
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'",
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
    PDO::ATTR_CASE => PDO::CASE_NATURAL
]);