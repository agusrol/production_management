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
        Schema::create('batches', function (Blueprint $table) { //checked 14.03.2025.1215
            $table->id(); // Auto-increment primary key
            $table->string('nro_lote', 50)->unique(); // Lot number (unique)
            $table->foreignId('product_id')->constrained()->onDelete('cascade'); // Mandatory
            $table->timestamps(); // Adds created_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('batches');
    }
};
