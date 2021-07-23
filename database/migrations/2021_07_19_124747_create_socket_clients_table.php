<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSocketClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('socket_clients')) {
            Schema::create('socket_clients', function (Blueprint $table) {
                $table->increments('client_id');
                $table->string('client_inet', 21)->unique();
                $table->string('client_nickname', 32)->unique();
                $table->timestamp('time_connected')->useCurrent();
                $table->timestamp('time_lastaction')->useCurrent();
                $table->boolean('flag_disconnect')->default(0);
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('socket_clients');
    }
}
