<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLabelTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('label_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('label_id');
            $table->string('locale')->index();
            $table->string('value');
            $table->timestamps();

            $table->unique(['label_id', 'locale']);
            $table->foreign('label_id')->references('id')->on('labels')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('label_translations');
    }
}
