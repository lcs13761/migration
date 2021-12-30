<?php

namespace Luke\Migration\Config;

class FileCreate
{
    

    public function createFile(string $fileName){
        if(!file_exists(CONFIG_PATH)) mkdir(CONFIG_PATH,0777,true);
        $fileName = ucfirst($fileName);
        if(file_exists(CONFIG_PATH ."/" .$fileName . ".php")) throw new \Exception("Arquivo ja existe");
        $file = fopen(CONFIG_PATH . "/"  . $fileName . ".php",'w+');
        if($file){
            $text = $this->copyFile();
            $lines = $this->modifyClassName($text,$fileName);
            fwrite($file,$lines);
            fclose($file);
        }
    }

    private function copyFile():string {
        $fileNameReplace = __DIR__ . "/../ModelFile/ModelFile.php";
        $fileCopy = fopen($fileNameReplace,'r');
        $text = fread($fileCopy,filesize($fileNameReplace));
        fclose($fileCopy);
        return $text;
    }

    private function modifyClassName(string $text,string $fileName):string {

        $lines = explode("\n",$text);
        $newLines = array();
        foreach ($lines as $line) {
            $newLines[] = preg_replace('/\s+/',' ',trim($line));
        }
        $searchValue = array_search("class ModelFile",$newLines);
        $fileName = ucfirst($fileName);
        $newLines[$searchValue] = "class $fileName";
        return implode("\n",$newLines);
    }
}