<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnArenaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('arena', function (Blueprint $table) {
            // Tambahkan kolom status setelah kolom arena_id
            $table->string('arenaStatus')->default('Tersedia')->after('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('arena', function (Blueprint $table) {
            // Drop kolom status jika perlu rollback migrasi
            $table->dropColumn('arenaStatus');
        });
    }
}
