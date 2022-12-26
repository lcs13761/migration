<?php

declare(strict_types=1);

namespace tests;

use Luke\Types\Blueprint;
use PHPUnit\Framework\TestCase;

class TypeTest extends TestCase
{
    public function testMethodType()
    {
        $methodType = new Blueprint;

        $methodType->id();
        $methodType->string('first_name');
        $methodType->string('last_name');
        $methodType->string('email')->unique();
        $methodType->string('password');
        $methodType->boolean('active')->default(0);
        $methodType->timestamps();

        $this->assertNotEmpty($methodType->getQuery());
    }
}
