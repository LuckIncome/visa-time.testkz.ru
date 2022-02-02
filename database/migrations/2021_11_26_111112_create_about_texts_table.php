<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutTextsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about_texts', function (Blueprint $table) {
            $table->id();
            $table->longText('content')->nullable();
            $table->string('image')->nullable();
            $table->string('icon')->nullable();
            $table->text('excerpt')->nullable();
            $table->longText('service')->nullable();
            $table->string('title')->nullable();
            $table->string('imageBg')->nullable();
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
        Schema::dropIfExists('about_texts');
    }
}
