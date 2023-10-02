<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNtdListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ntd_lists', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->text('long_name')->nullable();
            $table->json('control_method')->nullable();
            $table->boolean('weld_enabled')->default(false)->comment('Наличие описания сварки');
            $table->text('otu')->nullable();
            $table->string('details_type', 200)->nullable();
            $table->string('welding_method', 255)->nullable();
            $table->string('materials_group', 200)->nullable();
            $table->boolean('deleted')->default(false)->comment('флаг удаления записи');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ntd_lists');
    }
}
