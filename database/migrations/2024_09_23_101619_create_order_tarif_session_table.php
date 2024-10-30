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
    Schema::create('order_tarif_session', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('order_id');
        $table->unsignedBigInteger('tarif_session_id');
        $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
        $table->foreign('tarif_session_id')->references('id')->on('tarif_sessions')->onDelete('cascade');
    });
}

public function down()
{
    Schema::dropIfExists('order_tarif_session');
}

};
