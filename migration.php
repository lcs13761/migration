#!/usr/bin/php -q
<?php

use \Luke\Migration\Config\FileCreate;
use \Luke\Migration\Config\MigrationFile;


require_once "vendor/autoload.php";


switch ($_SERVER['argv'][1]) {
    case '-c':
    case '--create': {
            $config = new FileCreate();
            if (isset($_SERVER['argv'][2])) {
                try {
                    $config->createFile($_SERVER['argv'][2]);
                } catch (Exception $e) {
                    print($e);
                }
            } else {
                echo 'nenhum paramentro foi passado';
            }

            break;
        }
    case '-m':
    case '--migration': {
            $config = new MigrationFile();
            try {
                $config->actionMigration();
            } catch (Exception $e) {
                print($e);
            }
            break;
        }
    default:
        print( "error\n");
        break;
}

?>