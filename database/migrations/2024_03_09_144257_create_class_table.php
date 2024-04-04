<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassTable extends Migration
{
    public function up()
    {
        Schema::create('class', function (Blueprint $table) {
            $table->increments('ID_Class');
            $table->string('nom', 20);
            $table->string('filiere', 30);
            $table->string('niveau', 30);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('frais');
    }
}

