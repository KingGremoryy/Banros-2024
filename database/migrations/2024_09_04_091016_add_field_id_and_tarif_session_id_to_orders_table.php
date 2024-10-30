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
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            // Menambahkan kolom field_id dan tarif_session_id
            $table->unsignedBigInteger('field_id')->after('id');
            $table->unsignedBigInteger('tarif_session_id')->after('field_id');

            // Menambahkan foreign key constraints
            $table->foreign('field_id')->references('id')->on('fields')->onDelete('cascade');
            $table->foreign('tarif_session_id')->references('id')->on('tarif_sessions')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            // Drop foreign key constraints
            $table->dropForeign(['field_id']);
            $table->dropForeign(['tarif_session_id']);

            // Drop kolom field_id dan tarif_session_id
            $table->dropColumn('field_id');
            $table->dropColumn('tarif_session_id');
        });
    }
};
