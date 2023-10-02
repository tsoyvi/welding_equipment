<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groups_tech_devices', function (Blueprint $table) {
            $table->id();
            $table->string('name', 20)->comment('Сокращенное название Группы ТУ');
            $table->string('header', 255)->comment('Название Группы ТУ');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('groups_tech_devices');
    }
};
