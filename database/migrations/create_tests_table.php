<?php

namespace database\migrations;

use Luke\Schemas\Schema;
use Luke\Types\Blueprint;

return new class
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tests', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });
    }

};
