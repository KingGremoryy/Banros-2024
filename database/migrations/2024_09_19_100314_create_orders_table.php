<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('field_id');
            $table->unsignedBigInteger('tarif_session_id');
            $table->string('customer_name');
            $table->bigInteger('total_price');
            $table->enum('payment_status', ['pending', 'paid'])->default('pending');
            $table->timestamps();

            // Foreign keys
            $table->foreign('field_id')->references('id')->on('fields')->onDelete('cascade');
            $table->foreign('tarif_session_id')->references('id')->on('tarif_sessions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
