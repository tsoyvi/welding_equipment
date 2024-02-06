<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('equipment_lists', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('records')->cascadeOnDelete();
            $table->string('code_so', 10)->nullable()->comment('вид оборудования');
            $table->string('welding_method', 50)->nullable()->comment('способ сварки');
            $table->string('otu', 150)->nullable()->comment('ОТУ');
            $table->enum('type_att', ['Первичная', 'Периодическая', 'Дополнительная'])
                ->default('Первичная')->comment('Вид аттестации');
            $table->string('manufacturer', 100)->nullable()->comment('Производитель'); 
            $table->string('model', 100)->nullable()->comment('марка оборудования');
            $table->string('responsible', 100)->nullable()->comment('ответственный');
            $table->string('cert', 20)->nullable()->comment('сертификат');  
            $table->json('so')->nullable()->comment('данные об оборудовании');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipment_lists');
    }
};
