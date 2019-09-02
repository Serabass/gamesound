<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSoundsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sounds', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('game_id');
            $table->string('original_text');
            $table->string('behavior');
            $table->string('lang');
            $table->string('translation');
            $table->boolean('translation_accepted');
            $table->string('group_name')->nullable();
            $table->string('file_name');
            $table->string('is_speech');
            $table->string('gender');
            $table->boolean('recorded');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sounds');
    }
}
