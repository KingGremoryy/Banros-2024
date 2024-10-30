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
            // Menambah kolom baru 'date' sebelum kolom 'tarif_session_id'
            $table->date('date')->after('tarif_session_id');
        });
    }

    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            // Menghapus kolom 'date' jika diperlukan
            $table->dropColumn('date');
        });
    }
};
