<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLessFortunatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('less_fortunates', function (Blueprint $table) {
            $table->id();
            $table->string('name');

            $table->string('address');
            $table->string('address2');
            $table->string('city');
            $table->string('state');
            $table->integer('postcode');
            
            
            $table->string('phone');
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
        Schema::dropIfExists('less_fortunates');
    }
}
