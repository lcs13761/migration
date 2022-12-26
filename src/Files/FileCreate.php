<?php

namespace Luke\Migration\Config;

class FileCreate
{
    private $arrayFilterKeys = ['create_', '_table', '_table_'];

    public function createFile(string $fileName)
    {
        if (!file_exists(CONFIG_PATH)) {
            mkdir(CONFIG_PATH, 0777, true);
        }

        if (file_exists(CONFIG_PATH . "/" . $fileName . ".php")) {
            throw new \Exception("Arquivo ja existe");
        }
        $file = fopen(CONFIG_PATH . "/"  . $fileName . ".php", 'w+');
        if ($file) {
            $text = $this->copyFile();
            $lines = $this->modifyClassName($text, $fileName);
            fwrite($file, $lines);
            fclose($file);
        }
    }

    private function copyFile(): string
    {
        return file_get_contents(__DIR__ . "/../stub/migration.stub");
    }

    private function modifyClassName(string $text, string $table): string
    {
        foreach ($this->arrayFilterKeys as $key) {
            $table = str_replace($key, '', $table);
        }

        return str_replace('{{ $table }}', $table, $text);
    }
}
