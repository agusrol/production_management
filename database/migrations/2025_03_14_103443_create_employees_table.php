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
        Schema::create('employees', function (Blueprint $table) {   //checked 14.03.2025.1218
            $table->id(); // Auto-increment primary key (id)
            $table->foreignId('user_id')->unique()->constrained()->onDelete('cascade'); // Mandatory
            $table->string('nombre', 100);
            $table->string('apellido', 100);
            $table->timestamps(); // Adds created_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
