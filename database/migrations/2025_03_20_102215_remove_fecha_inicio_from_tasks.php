<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->dropColumn('fecha_inicio');
        });
    }
    
    public function down()
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->date('fecha_inicio')->nullable(); // In case you need to roll back
        });
    }
    
};
