<?php

namespace Luke\Migration\Config;

use database\migrations;

class MigrationFile
{
    public function actionMigration()
    {
        $this->file_exists();
        $this->browser_dir();
    }

    private function file_exists()
    {
        if (!file_exists(CONFIG_PATH)) {
            throw new \Exception('Arquivo não existe');
        }
    }

    private function browser_dir()
    {
        $dirs = glob(CONFIG_PATH . "/*");

        array_map(function ($dir) {
            echo "\e[32m" . $this->getNameFile($dir);
            $value = include_once($dir);
            $value->up();
        }, $dirs);
    }

    private function getNameFile($file): string
    {
        $names = explode('/', $file);

        return str_replace(".php", "", $names[array_key_last($names)]);
    }
}
