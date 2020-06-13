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
            $table->string('nom')->index();
            $table->string('prenoms')->index();
            $table->date('date_naissance')->nullable();
            $table->string('fonction');
            $table->string('phone1');
            $table->string('phone2')->nullable();
            $table->string('email')->unique()->index();
            $table->string('cv')->nullable();
            $table->string('photo')->nullable();
            $table->integer('structure_id')->nullable();
            $table->timestamps();

            $table->unsignedBigInteger('pays_id');

            $table->foreign('pays_id')->references('id')->on('pays')
                    ->onDelete('cascade')->onUpdate('cascade');
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
