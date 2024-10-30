<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RecreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Menghapus tabel bookings jika ada
        Schema::dropIfExists('booking');

        // Membuat tabel bookings baru
        Schema::create('booking', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('field_id');
            $table->date('date');
            $table->time('time');
            $table->enum('payment_status', ['pending', 'paid'])->default('pending');
            $table->timestamps();

            // Relasi ke tabel users dan fields
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('field_id')->references('id')->on('fields')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Menghapus tabel bookings
        Schema::dropIfExists('booking');
    }
}
