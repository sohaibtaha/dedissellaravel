<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCaravansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caravans', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('platenumber');
            $table->integer('capactiy');
            $table->string('brand');
            $table->string('chassis number');
            $table->string('description')->nullable;
            $table->decimal('priceweekly');
            $table->decimal('pricedaily');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('caravans');
    }
}
