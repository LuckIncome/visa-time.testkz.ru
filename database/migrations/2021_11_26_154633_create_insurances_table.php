<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInsurancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('insurances', function (Blueprint $table) {
            $table->id();
            $table->longText('content')->nullable();
            $table->longText('second_content')->nullable();
            $table->longText('third_content')->nullable();
            $table->longText('fourth_content')->nullable();
            $table->longText('fifth_content')->nullable();
            $table->string('first_image')->nullable();
            $table->string('second_image')->nullable();
            $table->longText('bottom_content')->nullable();
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
        Schema::dropIfExists('insurances');
    }
}
