<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::table('orders', function (Blueprint $table) {
        // Drop the foreign key constraint first
        $table->dropForeign(['tarif_session_id']); 
        
        // Then drop the column
        $table->dropColumn('tarif_session_id');
    });
}

public function down()
{
    Schema::table('orders', function (Blueprint $table) {
        // Re-add the column in case of rollback
        $table->unsignedBigInteger('tarif_session_id')->nullable();
        
        // Re-add the foreign key constraint in case of rollback
        $table->foreign('tarif_session_id')->references('id')->on('tarif_sessions')->onDelete('cascade');
    });
}

};
