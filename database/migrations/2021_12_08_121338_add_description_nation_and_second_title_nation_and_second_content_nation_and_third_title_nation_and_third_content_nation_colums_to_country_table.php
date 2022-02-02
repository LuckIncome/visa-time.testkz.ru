<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDescriptionNationAndSecondTitleNationAndSecondContentNationAndThirdTitleNationAndThirdContentNationColumsToCountryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('country', function (Blueprint $table) {
            $table->string('description_nation')->nullable();
            $table->string('second_title_nation')->nullable();
            $table->longText('second_content_nation')->nullable();
            $table->string('third_title_nation')->nullable();
            $table->longText('third_content_nation')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('country', function (Blueprint $table) {
            //
        });
    }
}
