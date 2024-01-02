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
        Schema::create('records', function (Blueprint $table) {
            $table->id();
            // $table->json('organization');
            $table->string('name_organization', 50)->nullable()->comment('Название организации');
            $table->string('address', 100)->nullable()->comment('адрес');
            $table->string('inn', 12)->nullable()->comment('ИНН');
            $table->string('name_contact', 50)->nullable()->comment('ФИО контактного лица');
            $table->string('phone', 50)->nullable()->comment('Телефон');
            $table->string('email', 20)->nullable()->comment('email');
            $table->string('website', 20)->nullable()->comment('сайт');
            $table->enum('organization_status', ['Потребитель', 'Производитель', 'Представитель производителя'])
                ->default('Потребитель')->comment('Статус организации');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('records');
    }
};
