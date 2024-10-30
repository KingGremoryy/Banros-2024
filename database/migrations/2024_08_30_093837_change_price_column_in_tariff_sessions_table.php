<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangePriceColumnInTariffSessionsTable extends Migration
{
    public function up()
    {
        Schema::table('tariff_sessions', function (Blueprint $table) {
            // Jika Anda ingin menyimpan price dalam format JSON, gunakan tipe data json
            $table->json('price')->change();
        });
    }

    public function down()
    {
        Schema::table('tariff_sessions', function (Blueprint $table) {
            // Kembalikan ke tipe data sebelumnya jika diperlukan
            $table->string('price')->change();
        });
    }
}
