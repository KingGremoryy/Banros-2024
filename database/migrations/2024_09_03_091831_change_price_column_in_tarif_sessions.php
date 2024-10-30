<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangePriceColumnInTarifSessions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tarif_sessions', function (Blueprint $table) {
            // Ubah kolom price dari decimal menjadi integer
            $table->integer('price')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tarif_sessions', function (Blueprint $table) {
            // Kembalikan kolom price ke tipe decimal jika diperlukan
            $table->decimal('price', 8, 2)->change();
        });
    }
}
