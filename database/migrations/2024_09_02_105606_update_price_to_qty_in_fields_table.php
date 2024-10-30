<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePriceToQtyInFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fields', function (Blueprint $table) {

            // Set the default value for 'qty' to 50000
            $table->unsignedBigInteger('qty')->default(50000)->change();
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
            // Rename the 'qty' column back to 'price'
           

            // Remove the default value for 'price'
            $table->unsignedBigInteger('price')->change();
        });
    }
}
