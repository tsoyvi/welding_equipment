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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('receipt_id')->nullable()->constrained('receipts')->cascadeOnDelete();
            $table->date('date_receipt')->nullable()->comment('Дата поступления');
            $table->date('date_registration')->nullable()->comment('Дата регистрации');
            $table->string('note', 256)->nullable()->comment('Примечание');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
