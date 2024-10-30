<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fields', function (Blueprint $table) {
            // Hapus kolom price
            $table->dropColumn('price');
            
            // Tambahkan kolom qty
            $table->integer('qty')->nullable()->after('name'); // Sesuaikan dengan kolom yang ada di tabel Anda
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('fields', function (Blueprint $table) {
            // Hapus kolom qty
            $table->dropColumn('qty');

            // Tambahkan kembali kolom price
            $table->decimal('price', 8, 2)->nullable()->after('name'); // Sesuaikan tipe data dengan yang sebelumnya
        });
    }
}
