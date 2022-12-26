<?php

namespace Src\Cli;

use Luke\Migration\Config\FileCreate;
use Luke\Migration\Config\MigrationFile;

class Cli
{
    public $array = [];

    public function __construct($commnad)
    {
        $this->array = [
            "--migration" => function ($file) {
                (new FileCreate)->createFile($file);
                echo "\e[32mMigration " . $file . " on successfully";
            },
            "--migrate" => function () {
                echo "\e[32mStarting the migration\n";
                (new MigrationFile)->actionMigration();
            }
        ];

        $this->handleAction($commnad);
    }

    private function handleAction($commnad)
    {
        try {
            unset($commnad[0]);
            $commnad = implode(" ", $commnad);
            $values = explode("=", $commnad);
            $function = $this->array[$values[0]];
            $function($values[1] ?? null);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage);
        }
    }
}
