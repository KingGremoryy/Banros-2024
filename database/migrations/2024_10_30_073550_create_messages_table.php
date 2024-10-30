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
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nama pengirim
            $table->string('phone'); // Nomor telepon pengirim
            $table->text('message'); // Isi pesan
            $table->timestamps(); // Untuk menyimpan waktu pesan dikirim
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('messages');
    }    
};
