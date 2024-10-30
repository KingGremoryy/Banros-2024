<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTarifSessionIdsToOrdersTable extends Migration
{
    /**
     * Tambahkan kolom tarif_session_ids ke tabel orders.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->json('tarif_session_ids')->nullable()->after('total_price');
        });
    }

    /**
     * Hapus kolom tarif_session_ids dari tabel orders.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn('tarif_session_ids');
        });
    }
}
