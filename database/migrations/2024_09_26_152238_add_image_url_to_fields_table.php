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
        Schema::table('fields', function (Blueprint $table) {
            $table->string('image_url')->nullable(); // Adding image_url column
        });
    }
    
    public function down()
    {
        Schema::table('fields', function (Blueprint $table) {
            $table->dropColumn('image_url');
        });
    }
    
};
