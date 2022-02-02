<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountryDocumentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('country_document', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('document_id')->default(0)->nullable();
            $table->foreign('document_id')->references('id')->on('document')->onDelete('cascade');
            $table->unsignedBigInteger('country_id')->default(0)->nullable();
            $table->foreign('country_id')->references('id')->on('country')->onDelete('cascade');
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
        Schema::dropIfExists('country_document');
    }
}
