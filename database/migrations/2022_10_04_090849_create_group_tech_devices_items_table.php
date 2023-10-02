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
        Schema::create('group_tech_devices_items', function (Blueprint $table) {
            $table->id();
            $table->string('index', '3')->comment('Номер в группе ТУ');
            $table->text('description')->comment('Описание в группе ТУ');
            $table->foreignId('gtd_id')->constrained('groups_tech_devices')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('group_tech_devices_items');
    }
};
