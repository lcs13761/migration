<?php

namespace Luke\Migration\Config;

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
        $dir = glob(CONFIG_PATH . "/*");
        foreach ($dir as $test) {
            $array = explode('\\', $test);
            foreach ($array as $value) {
                $model  = $this->formatNameToObject($value);
                $this->class_exists($model, $value);
            }
        }
    }

    private function formatNameToObject(string $value)
    {
        $array = explode('/', $value);
        $array = array_pop($array);
        return '\\' . str_replace('.php', "", $array);
    }

    private function class_exists($model, $nameTb)
    {
        require $nameTb;
        if (class_exists($model)) {
            $objectMigration = new $model();
            $objectMigration->up();
        }
    }
}
