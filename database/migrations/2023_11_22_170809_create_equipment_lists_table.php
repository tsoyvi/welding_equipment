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
            $table->foreignId('order_id')->nullable()->constrained('orders')->cascadeOnDelete();
            $table->string('type', 10)->nullable()->comment('вид оборудования');
            $table->string('model', 50)->nullable()->comment('марка оборудования');
            $table->string('number', 100)->nullable()->comment('зав номер');
            $table->string('date_production', 15)->nullable()->comment('дата изготовления');
            $table->string('date_start_exp', 15)->nullable()->comment('дата начала эксплуатации');
            $table->enum('type_att', ['Первичная', 'Периодическая', 'Дополнительная'])
                ->default('Первичная')->comment('Вид аттестации');
            $table->string('cert_attestation', 50)->nullable()->comment('Свидетельство аттестации');    
            $table->string('welding_method', 50)->nullable()->comment('способ сварки');
            $table->string('otu', 150)->nullable()->comment('ОТУ');
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
