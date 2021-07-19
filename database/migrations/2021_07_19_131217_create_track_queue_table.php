<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrackQueueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('track_queue', function (Blueprint $table) {
            $table->increments('track_id');
            $table->string('uri', 255);
            $table->string('preview_url', 255);
            $table->string('artist', 255);
            $table->string('title', 255);
            $table->integer('length_ms', 9)->default(0);
            $table->boolean('played')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('track_queue');
    }
}
