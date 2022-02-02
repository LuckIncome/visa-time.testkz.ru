<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('country', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('visa_category_id')->default(0)->nullable();
            $table->foreign('visa_category_id')->references('id')->on('visa_category');
            $table->string('name_country')->nullable();
            $table->string('icon')->nullable();
            $table->string('slug')->unique();
            $table->string('title_main')->nullable();
            $table->string('image_bg')->nullable();
            $table->string('timing_title_first')->nullable();
            $table->string('timing_excerpt_first')->nullable();
            $table->string('timing_title_second')->nullable();
            $table->string('timing_excerpt_second')->nullable();
            $table->string('timing_title_third')->nullable();
            $table->string('timing_excerpt_third')->nullable();
            $table->string('icon_first')->nullable();
            $table->string('icon_title_first')->nullable();
            $table->string('icon_second')->nullable();
            $table->string('icon_title_second')->nullable();
            $table->string('icon_third')->nullable();
            $table->string('icon_title_third')->nullable();
            $table->string('title_how')->nullable();
            $table->longText('content_how')->nullable();
            $table->string('title_document')->nullable();
            $table->string('subtitle_document_first')->nullable();
            $table->string('subtitle_document_second')->nullable();
            $table->string('title_price')->nullable();
            $table->longText('content_price')->nullable();
            $table->string('title_nation')->nullable();
            $table->string('first_image')->nullable();
            $table->string('second_image')->nullable();
            $table->string('third_image')->nullable();
            $table->longText('content_nation')->nullable();
            $table->string('title_review')->nullable();
            $table->longText('bottom_content')->nullable();
            $table->boolean('status')->default(0);
            $table->integer('sort_id')->default(0);
            $table->string('seo_title')->nullable(); 
            $table->text('meta_description')->nullable();
            $table->text('meta_keywords')->nullable();
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
        Schema::dropIfExists('country');
    }
}
