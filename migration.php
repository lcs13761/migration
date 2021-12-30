#!/usr/bin/php -q
<?php

use \Luke\Migration\Config\FileCreate;
use \Luke\Migration\Config\MigrationFile;


if (!ini_get('date.timezone')) {
    ini_set('date.timezone', 'UTC');
}

if (isset($GLOBALS['_composer_autoload_path'])) {
    define('COMPOSER_INSTALL', $GLOBALS['_composer_autoload_path']);

    unset($GLOBALS['_composer_autoload_path']);
} else {
    $array = array(__DIR__ . '/../../autoload.php', __DIR__ . '/../vendor/autoload.php', __DIR__ . '/vendor/autoload.php');
    foreach ($array as $file) {
        if (file_exists($file)) {
            define('COMPOSER_INSTALL', $file);

            break;
        }
    }

    unset($file);
}


require COMPOSER_INSTALL;


switch ($_SERVER['argv'][1]) {
    case '-c':
    case '--create': {
            $config = new FileCreate();
            if (isset($_SERVER['argv'][2])) {
                try {
                    $config->createFile($_SERVER['argv'][2]);
                    fwrite(STDERR,
                        'File created successfully, in just databasee'. PHP_EOL
                    );
                } catch (Exception $e) {
                    fwrite(STDERR,
                        $e->getMessage(). PHP_EOL
                    );

                }
            } else {
                fwrite(STDERR,
                    'no parameters were passed'. PHP_EOL
                );
            }

            break;
        }
    case '-m':
    case '--migration': {
            $config = new MigrationFile();
            try {
                $config->actionMigration();
                fwrite(STDERR,
                    "Table created successfully " . PHP_EOL
                );
            } catch (Exception $e) {
                fwrite(STDERR,
                    $e->getMessage() . PHP_EOL
                );
            }
            break;
        }
    default:
        print( "error\n");
        break;
}

?>