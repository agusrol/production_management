<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->dropColumn('fecha_fin'); // Remove the column
        });
    }

    public function down()
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->date('fecha_fin')->nullable(); // Add it back if needed
        });
    }
};
