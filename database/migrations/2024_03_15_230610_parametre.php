<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('parametre', function (Blueprint $table) {
            $table->increments('ID_Parametre');
            $table->string('paypal', 20);
            $table->string('logo', 255);
            $table->string('Fevicon', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('parametre');
    }
};
