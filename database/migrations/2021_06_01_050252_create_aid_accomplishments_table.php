<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAidAccomplishmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aid_accomplishments', function (Blueprint $table) {
            $table->id();
            $table  ->foreignId('lessFortunate_id')
                    ->constrained('less_fortunates');
            $table  ->foreignId('volunteer_id')
                    ->constrained('users');
            $table->dateTime('submitted_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aid_accomplishments');
    }
}
