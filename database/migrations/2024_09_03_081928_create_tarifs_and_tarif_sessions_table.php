<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTarifsAndTarifSessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Create the 'tarifs' table
        Schema::create('tarifs', function (Blueprint $table) {
            $table->id();
            $table->string('day');
            $table->timestamps();
        });

        // Create the 'tarif_sessions' table
        Schema::create('tarif_sessions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tarif_id')->constrained('tarifs')->onDelete('cascade');
            $table->string('session_time');
            $table->decimal('price', 8, 2);
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
        // Drop the 'tarif_sessions' table first due to foreign key dependency
        Schema::dropIfExists('tarif_sessions');
        
        // Drop the 'tarifs' table
        Schema::dropIfExists('tarifs');
    }
}
