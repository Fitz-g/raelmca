<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdherantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adherants', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenoms');
//            $table->date('date_naissance');
            $table->string('fonction');
            $table->string('phone1');
            $table->string('phone2')->nullable();
            $table->string('email')->unique();
            $table->string('cv')->nullable();
            $table->string('photo')->nullable();
            $table->integer('structure_id')->nullable();
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
        Schema::dropIfExists('adherants');
    }
}
