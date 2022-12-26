<?php

declare(strict_types=1);

namespace tests;

use Luke\Migration\Config\FileCreate;
use Luke\Migration\Config\MigrationFile;
use Luke\Types\Blueprint;
use PHPUnit\Framework\TestCase;

class FileCreateTest extends TestCase
{
    public function testFileCreate()
    {
        $name = 'create_test_table';

        //(new FileCreate())->createFile($name);

        $this->assertFileExists(CONFIG_PATH . "/" . $name . ".php");
    }

    public function testFileMigration()
    {
        (new MigrationFile())->actionMigration();

    }
}
